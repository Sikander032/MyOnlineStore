<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'company',
        'country',
        'zip_code',
        'address_1',
        'address_2',
        'is_billing_address_same',
        'billing_address',
        'cart_data',
        'user_id'
    ];

    public function payPalPayment()
    {
        return $this->hasOne(PayPalPayment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
