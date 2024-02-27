<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtSlsscMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smt_slssc_mappings', function (Blueprint $table) {
            $table->id();
            $table->integer('smt_id')->nullable();
            $table->integer('slssc_id')->nullable();
            $table->integer('slssc_scheme_id')->nullable();
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
        Schema::dropIfExists('smt_slssc_mappings');
    }
}
