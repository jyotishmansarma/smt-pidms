<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagePhysicalProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_physical_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panchayat_id');
            $table->foreign('panchayat_id')
                ->references('id')
                ->on('panchayats')
                ->onDelete('cascade');

            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('house_holds');
            $table->unsignedBigInteger('house_connection');
            $table->date('exp_date_of_saturation')->nullable();;
            $table->date('exp_date_of_har_ghar_jal')->nullable();;

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
        Schema::dropIfExists('village_physical_progress');
    }
}
