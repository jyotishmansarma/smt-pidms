<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlsscSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slssc_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('district_id');
            $table->string('division_id');
            $table->string('scheme_name',1000);
            $table->string('sanctioned_type');
            $table->string('scheme_type')->nullable();
            $table->double('final_estmd_cost')->default(0.0);
            $table->unsignedBigInteger('final_fhtcs_approved')->default(0);
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
        Schema::dropIfExists('slssc_schemes');

    }
}
