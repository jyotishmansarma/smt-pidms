<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('division_id');
            $table->Integer('scheme_id');
            $table->Integer('contractor_id');
            $table->string('workorder_no');
            $table->string('remarks');
            $table->unsignedBigInteger('status')->default(1);
            $table->foreign('status')->references('id')->on('statuses');
            $table->foreign('division_id')->references('id')->on('division_master');
            $table->foreign('scheme_id')->references('scheme_id')->on('schemes');
            $table->foreign('contractor_id')->references('id')->on('contractors');
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
        Schema::dropIfExists('purchase_orders');
    }
}