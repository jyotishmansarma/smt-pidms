<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitations', function (Blueprint $table) {
            $table->id();
            $table->string('habitation_name');
            $table->unsignedBigInteger('habitation_id');
            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->onDelete('cascade');
            $table->timestamps();
            $table->unique(['habitation_id','village_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitations');
    }
}
