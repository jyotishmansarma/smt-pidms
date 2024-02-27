<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchemeIdToSlsscApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slssc_approvals', function (Blueprint $table) {
            $table->unsignedBigInteger('slssc_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slssc_approvals', function (Blueprint $table) {
            $table->dropColumn('slssc_id');

        });
    }
}
