<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('orderItemId');
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('orderCartId');
            $table->smallInteger('qty');

            $table->foreign('productId')->references('productId')->on('products');
            $table->foreign('orderCartId')->references('orderCartId')->on('order_carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
