<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class paymentController extends Controller
{
    public function createCharge(Request $request)
    {
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
            $stripeCharge = Stripe::charges()->create(array(
                "amount" => $request->amount_to_charge,
                "currency" => "usd",
                "source" => $request->input('stripe_token'),
                "description" => "Test payment."
            ));
            return response()->json($stripeCharge, 200);
        } catch (CardErrorException $e) {
            return response()->json($e, 500);
        }
    }

    public function updateCartPayment(Request $request)
    {
        Order::where('id', $request->order_id)->update(array('payment_method' => $request->payment_method, 'payment_id' => $request->payment_id,));
    }
}
