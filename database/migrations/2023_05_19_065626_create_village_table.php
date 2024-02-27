<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->string('village_name');
            $table->unsignedBigInteger('village_id');
            $table->unsignedBigInteger('panchayat_id');
            $table->foreign('panchayat_id')
                ->references('id')
                ->on('panchayats')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['village_id','panchayat_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('villages');
    }
}
