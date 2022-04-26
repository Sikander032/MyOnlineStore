<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\ErrorResponse;
use App\Http\Responses\SuccessResponse;
use App\Order;
use App\PayPalPayment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PayPalPaymentController extends Controller
{
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {
        $itemsArray = [];
        $sumTotal = 0;
        foreach($request->cart as $cartProduct){
            $item = new Item();
            $itemsArray[] = $item->setName($cartProduct['name']) /** item name **/
            ->setCurrency('USD')
                ->setQuantity($cartProduct['quantity'])
                ->setPrice($cartProduct['price']); /** unit price **/
            $sumTotal = $sumTotal + $cartProduct['totalPrice'];
        };
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_list = new ItemList();
        $item_list->setItems($itemsArray);
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($sumTotal);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl('http://127.0.0.1:8999/payment') /** Specify return URL **/
        ->setCancelUrl('http://127.0.0.1:8999/payment');
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return (new ErrorResponse())->toResponse($ex->getMessage());
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return (new ErrorResponse())->toResponse($ex->getMessage());
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                Session::put('paypal_payment_id', $payment->getId());
                if (isset($redirect_url)) {
                    /** redirect to paypal **/
                    return (new SuccessResponse())->toResponse('', [
                        'url' => $redirect_url
                    ]);
                }
                Session::put('error', 'Unknown error occurred');
            }
        }
    }

    public function getPaymentStatus(Request $request)
    {
        try {
            /** Get the payment ID before session clear **/
            $payment_id = Session::get('paypal_payment_id');
            /** clear the session payment ID **/
            $order =  Order::find($request->order_id);
            Session::forget('paypal_payment_id');
            if (empty($request->payer_id) || empty($request->token)) {
                Session::put('error', 'Payment failed');

                $order->payPalPayment()->updateOrCreate([
                    'paypal_payment_id' => $request->payment_id,
                    'payer_id' => $request->payer_id,
                    'token' => $request->token,
                    'status' => 'failed'
                ]);

                return (new SuccessResponse())->toResponse('', [
                    'status' => 'payment_failed'
                ]);
            }
            $payment = Payment::get($request->payment_id, $this->_api_context);
            $execution = new PaymentExecution();
            $execution->setPayerId($request->payer_id);
            /**Execute the payment **/
            $result = $payment->execute($execution, $this->_api_context);
            if ($result->getState() == 'approved') {
                $order->payPalPayment()->updateOrCreate([
                    'paypal_payment_id' => $request->payment_id,
                    'payer_id' => $request->payer_id,
                    'token' => $request->token,
                    'status' => $result->getState()
                ]);
                Session::put('success', 'Payment success');
                return (new SuccessResponse())->toResponse('', [
                    'status' => $result->getState()
                ]);
                exit;
            }
            return (new SuccessResponse())->toResponse('', [
                'status' => $result->getState()
            ]);
            Session::put('error', 'Payment failed');
        } catch (Exception $e) {
            return (new ErrorResponse())->toResponse($e->getMessage());
        }
    }
}
