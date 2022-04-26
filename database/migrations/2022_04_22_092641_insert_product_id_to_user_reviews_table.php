<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProductIdToUserReviewsTable extends Migration
{

    public function up()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            if (! Schema::hasColumn('user_reviews', 'on_sale')) {
                $table->unsignedBigInteger('product_id')->after('review')->nullable()->default(null);
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }
        });
    }


    public function down()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            if (Schema::hasColumn('user_reviews', 'on_sale')) {
                $table->dropForeign('product_id');
                $table->dropColumn('product_id');
            }
        });
    }
}
