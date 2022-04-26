<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnSaleAndDiscountedPriceColumnsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            if (! Schema::hasColumn('products', 'on_sale'))
            {
                $table->boolean('on_sale')->after('specialized_product')->default(false);
            }

            if (! Schema::hasColumn('products', 'discounted_price')) {
                $table->decimal('discounted_price')->after('on_sale')->nullable()->default(null);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'on_sale') && Schema::hasColumn('products', 'discounted_price'))
            {
                $table->dropColumn('on_sale');
                $table->dropColumn('discounted_price');
            }
        });
    }
}
