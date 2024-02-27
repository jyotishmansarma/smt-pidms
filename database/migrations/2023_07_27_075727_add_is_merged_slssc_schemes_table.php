<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsMergedSlsscSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('slssc_schemes', function ($table) {
            $table->integer('is_merged')->nullable()->after('final_fhtcs_approved');
            $table->integer('merged_with')->nullable()->after('is_merged');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slssc_schemes', function ($table) {
            $table->dropColumn('is_merged');
            $table->dropColumn('merged_with');
        });
    }
}
