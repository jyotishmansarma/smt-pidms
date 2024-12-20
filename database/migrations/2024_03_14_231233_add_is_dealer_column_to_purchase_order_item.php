<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDealerColumnToPurchaseOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pidms_purchase_order_items', function (Blueprint $table) {
            $table->boolean('is_dealer_exist')->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pidms_purchase_order_items', function (Blueprint $table) {
            //[
            $table->dropColumn('is_dealer_exist');
        });
    }
}
