<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanchayatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panchayats', function (Blueprint $table) {
            $table->id();
            $table->string('panchayat_name');
            $table->unsignedBigInteger('block_id');
            $table->foreign('block_id')
                ->references('id')
                ->on('blocks')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['panchayat_name','block_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panchayats');
    }
}
