<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatedSMTdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updated_s_m_tdatas', function (Blueprint $table) {
            $table->id();
        
            $table->integer('smt_id')->nullable();
            $table->string('update_est_cost')->nullable();
            $table->integer('update_no_fhtc')->nullable();
            $table->integer('is_matching')->nullable()->comment('1:matching,0:not_matching');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updated_s_m_tdatas');
    }
}
