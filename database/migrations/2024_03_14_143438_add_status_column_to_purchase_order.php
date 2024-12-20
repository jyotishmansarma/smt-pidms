<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusColumnToPurchaseOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pidms_purchase_orders', function (Blueprint $table) {
            $table->double('order_grand_total')->after('workorder_no');

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
            $table->dropColumn('order_grand_total','is_verified','is_completed');
        });
    }
}
