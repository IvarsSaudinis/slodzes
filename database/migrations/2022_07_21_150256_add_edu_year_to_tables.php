<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEduYearToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan', function (Blueprint $table) {
            $table->renameColumn('year', 'edu_year_id');
        });

        Schema::table('plan', function (Blueprint $table) {
            $table->unsignedSmallInteger('edu_year_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan', function (Blueprint $table) {
            $table->renameColumn('edu_year_id', 'year');
        });

        Schema::table('plan', function (Blueprint $table) {
            $table->year('year')->change();
        });
    }
};
