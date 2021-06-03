<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_carts', function (Blueprint $table) {
            $table->bigIncrements('orderCartId');
            $table->integer('status');
            $table->string('notes', 1000)->nullable();
            $table->date('purchaseDate')->nullable();
            $table->text('history', 16383)->nullable();
            $table->decimal('taxes', 13, 2)->nullable();
            $table->decimal('orderTotal', 13, 2)->nullable();
            $table->string('shippingFirstName', 100)->nullable();
            $table->string('shippingLastName', 100)->nullable();
            $table->string('shippingAddress1', 250)->nullable();
            $table->string('shippingAddress2', 250)->nullable();
            $table->string('shippingCity', 100)->nullable();
            $table->string('shippingState', 10)->nullable();
            $table->string('shippingPostalCode', 20)->nullable();
            $table->string('shippingPhone', 20)->nullable();
            $table->string('shippingEmail', 250)->nullable();
            $table->string('billingAddress1', 250)->nullable();
            $table->string('billingAddress2', 250)->nullable();
            $table->string('billingCity', 100)->nullable();
            $table->string('billingState', 10)->nullable();
            $table->string('billingPostalCode', 20)->nullable();
            $table->string('uniqueIdentifier', 50)->nullable();
            $table->unsignedBigInteger('websiteId');
            $table->date('dateCreated')->nullable();
            $table->string('billingFirstName', 100)->nullable();
            $table->string('billingLastName', 100)->nullable();
            $table->string('billingPhone', 20)->nullable();
            $table->string('billingEmail', 250)->nullable();
            $table->char('shippingCountry', 2)->nullable();
            $table->char('billingCountry', 2)->nullable();
            $table->string('authorizationCode', 100)->nullable();
            $table->string('transactionId', 100)->nullable();
            $table->boolean('shippingValidation')->nullable();
            $table->decimal('shippingCost', 13, 2)->nullable();
            $table->smallInteger('shippingType')->nullable();
            $table->string('creditCardType', 50)->nullable();

            $table->foreign('websiteId')->references('websiteId')->on('websites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_carts');
    }
}
