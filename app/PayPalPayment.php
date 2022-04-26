<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayPalPayment extends Model
{
    protected $fillable = ['paypal_payment_id','payer_id','token','status','order_id'];

    public function Order()
    {
        return $this->belongsTo(Order ::class);
    }
}
