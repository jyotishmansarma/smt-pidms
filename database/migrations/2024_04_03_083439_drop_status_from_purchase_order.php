<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropStatusFromPurchaseOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pidms_purchase_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('status')->after('order_grand_total')->default(1);
            $table->foreign('status')->references('id')->on('pidms_statuses');

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
