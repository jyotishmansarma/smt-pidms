<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManufactureDealerToPurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pidms_purchase_orders', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('dealer_id')->nullable();
            $table->unsignedBigInteger('manufacturer_id')->nullable();

            $table->foreign('dealer_id')->references('id')->on('dealers');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pidms_purchase_orders', function (Blueprint $table) {
            //
        });
    }
}
