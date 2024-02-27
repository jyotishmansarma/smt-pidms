<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemeCompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheme_completions', function (Blueprint $table) {
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
            $table->unsignedBigInteger('completed_schemes')->default(0);
            $table->unsignedBigInteger('fhtc_in_completed_schemes')->default(0);
            $table->unsignedBigInteger('completed_schemes_handed_pri')->default(0);
            $table->unsignedBigInteger('balance_schemes_handed_pri')->default(0);
            $table->unsignedBigInteger('wuc_formed_againts_completed_schemes')->default(0);
            $table->unsignedBigInteger('wuc_not_formed_againts_completed_schemes')->default(0);
            $table->unsignedBigInteger('no_of_jal_mitra_trained')->default(0);
            $table->unsignedBigInteger('no_of_jal_mitra_eng_letter')->default(0);
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
        Schema::dropIfExists('scheme_completions');
    }
}
