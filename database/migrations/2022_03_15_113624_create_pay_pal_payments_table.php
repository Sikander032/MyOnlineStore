<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayPalPaymentsTable extends Migration
{

    public function up()
    {
        Schema::create('pay_pal_payments', function (Blueprint $table) {
            $table->id();
            $table->string('paypal_payment_id')->nullable();
            $table->string('payer_id')->nullable();
            $table->string('token')->nullable();
            $table->enum('status', ['approved', 'failed']);
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->after('token')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('pay_pal_payments');
    }
}
