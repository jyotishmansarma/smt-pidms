<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClfActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clf_activities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')
                ->references('id')
                ->on('divisions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('proposed_villages');
            $table->unsignedBigInteger('actually_alloted_village');
            $table->unsignedBigInteger('clf_alloted');
            $table->boolean('is_training_conducted');
            $table->unsignedBigInteger('water_user_committee');
            $table->unsignedBigInteger('water_user_committee_bank_ac');
            $table->unsignedBigInteger('hh_ipc_done');
            $table->unsignedBigInteger('skilled_manpower_listed');
            $table->date('issued_date')->nullable();;
            $table->string('remarks');

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
        Schema::dropIfExists('clf_activities');
    }
}
