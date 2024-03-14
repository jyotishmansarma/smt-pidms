<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdiCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdi_certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_order_id');
            $table->unsignedBigInteger('pdi_agency_id');
            $table->string('certificate_no');
            $table->timestamp('certificate_date');
            $table->string('certificate_file');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->foreign('pdi_agency_id')->references('id')->on('pdi_agencies');
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
        Schema::dropIfExists('pdi_certificates');
    }
}
