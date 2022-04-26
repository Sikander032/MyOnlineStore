<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Order;
use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function removeFromCart(Request $request)
    {
        $items = \Cart::getContent();
        \Cart::remove($request->params['item_to_remove']['id']);
    }

    public function index()
    {
        $userId = 1; // get this from session or wherever it came from

        if (request()->ajax()) {
            $items = [];

            \Cart::session($userId)->getContent()->each(function ($item) use (&$items) {
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ), 200, []);
        } else {
            return view('cart');
        }
    }

    public function add(Request $request)
    {
        $orderID = rand(0000, 9999);

        $itemsArray = [];

        if ($request->filled('cart')) {
            foreach ($request->cart as $cartItem) {
                $itemsArray[] = array(
                    'id' => $cartItem['id'],
                    'name' => $cartItem['name'],
                    'price' => $cartItem['price'],
                    'quantity' => $cartItem['quantity'],
                    'attributes' => $this->getAttributes($cartItem['orderedSizes']),
                );
            };
            $item = \Cart::session($orderID)->add($itemsArray);
        }

        $items =  \Cart::session($orderID)->getContent()->each(function ($item) use (&$items) {
            $items[] = $item;
        });

        $data = $request->shipping_address;
        $data['user_id'] = $request->user_id;
        $data['cart_data'] = json_encode($items);
        // save cart to db
        if (empty($request->order_id)) {
            $order = Order::create(
                $data
            );
        } else {
            $order = Order::updateOrCreate(
                ['id' => $request->order_id],
                $data
            );
        }


        return response(array(
            'success' => true,
            'data' => $items,
            'message' => "item added.",
            'order_id' => $order->id
        ), 201, []);
    }

    public function addCondition()
    {
        $userId = 1; // get this from session or wherever it came from

        /** @var \Illuminate\Validation\Validator $v */
        $v = validator(request()->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
            'target' => 'required|string',
            'value' => 'required|string',
        ]);

        if ($v->fails()) {
            return response(array(
                'success' => false,
                'data' => [],
                'message' => $v->errors()->first()
            ), 400, []);
        }

        $name = request('name');
        $type = request('type');
        $target = request('target');
        $value = request('value');

        $cartCondition = new CartCondition([
            'name' => $name,
            'type' => $type,
            'target' => $target, // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => $value,
            'attributes' => array()
        ]);

        \Cart::session($userId)->condition($cartCondition);

        return response(array(
            'success' => true,
            'data' => $cartCondition,
            'message' => "condition added."
        ), 201, []);
    }

    public function clearCartConditions()
    {
        $userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->clearCartConditions();

        return response(array(
            'success' => true,
            'data' => [],
            'message' => "cart conditions cleared."
        ), 200, []);
    }

    public function delete($id)
    {
        $userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->remove($id);

        return response(array(
            'success' => true,
            'data' => $id,
            'message' => "cart item {$id} removed."
        ), 200, []);
    }

    public function details()
    {
        $userId = 1; // get this from session or wherever it came from

        // get subtotal applied condition amount
        $conditions = \Cart::session($userId)->getConditions();


        // get conditions that are applied to cart sub totals
        $subTotalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'subtotal';
        })->map(function (CartCondition $c) use ($userId) {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        // get conditions that are applied to cart totals
        $totalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'total';
        })->map(function (CartCondition $c) {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => \Cart::session($userId)->getTotalQuantity(),
                'sub_total' => \Cart::session($userId)->getSubTotal(),
                'total' => \Cart::session($userId)->getTotal(),
                'cart_sub_total_conditions_count' => $subTotalConditions->count(),
                'cart_total_conditions_count' => $totalConditions->count(),
            ),
            'message' => "Get cart details success."
        ), 200, []);
    }

    public function updateShippingMethod(Request $request)
    {
        Order::where('id', $request->order_id)->update(array('shipping_method' => $request->shipping_method));
    }

    public function orderComplete(Request $request)
    {
        try {
            $orderNumber = '';
            if ($request->filled('order_id')) {
                $bytes = random_bytes(5);
                $orderNumber = strtoupper(bin2hex($bytes) . $request->order_id);


                $order = Order::select('order_number')->where('id', $request->order_id)->first();

                if (empty($order->order_number)) {
                    Order::where('id', $request->order_id)->update(array('order_number' => $orderNumber));
                    $order = Order::select('order_number')->where('id', $request->order_id)->first();
                    $orderNumber = $order->order_number;
                } else {
                    $orderNumber = $order->order_number;
                }


                return (new SuccessResponse())->toResponse('', [
                    'orderNumber' => $orderNumber,
                ]);
            }
        } catch (\Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());

        }

    }

    private function getAttributes($orderedSizes)
    {
        foreach ($orderedSizes as $orderedSize) {
            $customAttributes[] =  [
                'color_attr' => [
                    'label' => '',
                    'price' => '',
                ],
                'size_attr' => [
                    'label' => $orderedSize,
                    'price' => '',
                ]
            ];
        }
        return $customAttributes;

    }
}
