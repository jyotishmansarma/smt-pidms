<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToUpdatedSMTdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('updated_s_m_tdatas', function (Blueprint $table) {
            $table->integer('status')->after('is_matching');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('updated_s_m_tdatas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
