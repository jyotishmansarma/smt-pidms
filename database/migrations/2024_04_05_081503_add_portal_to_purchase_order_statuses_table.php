<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPortalToPurchaseOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_order_statuses', function (Blueprint $table) {
            $table->integer('portal')->after('status')->comment('1:smt,2:pidms')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_order_statuses', function (Blueprint $table) {
            $table->dropColumn('portal');
        });
    }
}
