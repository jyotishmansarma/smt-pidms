<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producttype_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('dealer_id');
            $table->string('batchno')->nullable();
            $table->double('quantity');
            $table->double('price');
            $table->double('totalprice');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('producttype_id')->references('id')->on('product_types');
            $table->foreign('dealer_id')->references('id')->on('ipet_dealer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_items');
    }
}
