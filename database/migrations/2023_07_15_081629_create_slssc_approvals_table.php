<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlsscApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slssc_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slssc_scheme_id');
            $table->double('estimated_cost');
            $table->unsignedBigInteger('fhtc_planned');
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
        Schema::dropIfExists('slssc_approvals');
    }
}
