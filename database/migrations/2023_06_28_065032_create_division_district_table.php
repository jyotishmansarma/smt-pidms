<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('division_district', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')
                ->references('id')
                ->on('divisions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onDelete('cascade');


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
        Schema::dropIfExists('division_district');
    }
}
