<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*
            1. Interfeisā ir aktuālais mācību gads un pēc tā arī skatās visu informāciju;
            2. Atverot mācība gada info, parādās sadalījumi par nedēļām;
                - 1, 2, 3, 4 .. 44. nedēļa
            3. Atverot nedēļu, ir sadalījums pa dienām (nedēļas sākums, nedēļas beigas utt)
        */
        /*
            Mācību gadi ->  21/22, 22/23
        */
        Schema::create('edu_year', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('edu_week_type', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
        });

        Schema::create('edu_week', function (Blueprint $table) {
            $table->id();
            $table->smallinteger('edu_year_id')->unsigned()->index();  // 1, 2, 3, 4 1.name = 22/23
            $table->foreign('edu_year_id')->references('id')->on('edu_year');

            $table->smallinteger('number'); // mācību nedēļas nr .. 1->46
            $table->date('start_date'); // end_date = start_date + 6
            $table->smallInteger('edu_week_type_id')->unsigned()->nullable(); // tips nedēļai (I, II, Holiday, etc)
            $table->foreign('edu_week_type_id')->references('id')->on('edu_week_type')->onDelete('set null');

            $table->timestamps();
        });

        Schema::create('edu_date', function (Blueprint $table) {
            $table->date('date')->index();
            $table->integer('workweek_id')->nullable();
            $table->timestamps();
        });

        Schema::create('edu_holidays', function (Blueprint $table) {
            $table->date('date')->index();
            $table->string('name');
            $table->string('color', 8)->nullable(); // priekš UI
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
        Schema::dropIfExists('edu_week');
        Schema::dropIfExists('edu_year');
        Schema::dropIfExists('edu_week_type');
        Schema::dropIfExists('edu_date');
        Schema::dropIfExists('edu_holidays');
    }


}
