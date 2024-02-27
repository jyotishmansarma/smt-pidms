<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandFinalizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_finalizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onDelete('cascade');
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')
                ->references('id')
                ->on('divisions')
                ->onDelete('cascade');
            $table->unsignedBigInteger('sanctioned_schemes')->default(0);
            $table->unsignedBigInteger('no_of_schemes_district_aa')->default(0);
            $table->unsignedBigInteger('aa_obtained_district_aa')->default(0);
            $table->unsignedBigInteger('balance_aa')->default(0);
            $table->unsignedBigInteger('land_finalized')->default(0);
            $table->unsignedBigInteger('balance_for_land_finalized')->default(0);

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
        Schema::dropIfExists('land_finalizations');
    }
}
