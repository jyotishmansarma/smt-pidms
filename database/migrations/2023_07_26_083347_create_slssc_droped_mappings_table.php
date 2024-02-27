<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlsscDropedMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slssc_droped_mappings', function (Blueprint $table) {
            $table->id();
            $table->integer('slssc_scheme_id');
            $table->integer('status')->nullable()->comment('1:dropped,2:mapping');
            $table->integer('mapping_slssc_scheme_id')->nullable();
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
        Schema::dropIfExists('slssc_droped_mappings');
    }
}
