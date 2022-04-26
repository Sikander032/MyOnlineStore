<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->boolean('is_billing_address_same')->default(0)->nullable();
            $table->string('billing_address')->nullable();
            $table->longText('cart_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
