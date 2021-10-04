<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createtimetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetable_year', function (Blueprint $table) {
            $table->id();
            $table->string('year', 4);   // 2021, 2122, 2223 ...
            $table->string('name')->nullable(); // mācību gada apzīmējums (2021./ 2022. mācību gads)
            $table->timestamps();
        });

        Schema::create('timetable_week', function (Blueprint $table) {
            $table->id();
            $table->integer('timetable_year_id');   // Mācību gads 2020/21  2021/22
            $table->integer('week_number'); // 1. setembra nedēļa ir 1 nedēļa
            $table->date('start'); // sākuma laiks .. beigu laiks ir + 7 dienas => 01.09.2021 - 07.09.2021
            $table->string('name')->nullable(); // neobligāts apzīmējums ..
            $table->bigInteger('editor'); // user_id
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
        Schema::dropIfExists(['timetable', 'timetable_year']);
    }
}
