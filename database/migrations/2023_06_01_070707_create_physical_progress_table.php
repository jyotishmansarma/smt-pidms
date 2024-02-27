<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_progress', function (Blueprint $table) {
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
            $table->string('scheme_name');
            $table->unsignedBigInteger('scheme_id');
            $table->foreign('scheme_id')
                ->references('id')
                ->on('schemes')
                ->onDelete('cascade');
            $table->unsignedBigInteger('estimated_cost')->default(0);
            $table->unsignedBigInteger('fhtc_planned')->default(0);
            $table->unsignedBigInteger('physical_progess')->default(0);
            $table->dateTime('expected_date');
            $table->dateTime('expected_date_trial_run');
            $table->dateTime('expected_date_handover');


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
        Schema::dropIfExists('physical_progress');
    }
}
