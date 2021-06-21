<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('year');
            $table->text('info')->nullable();
            $table->timestamps();
        });

        Schema::create('plan_data', function (Blueprint $table) {
            $table->id();
            $table->integer('plan_id');
            $table->integer('module_id');
            $table->string('code', 10)->nullable();
            $table->timestamps();
        });


        Schema::create('plan_distribution', function (Blueprint $table) {
            $table->id();
            $table->integer('plan_data_id');
            $table->integer('course');
            $table->integer( 'theory')->nullable();
            $table->integer( 'practice')->nullable();
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
        Schema::dropIfExists('plan');
        Schema::dropIfExists('plan_data');
        Schema::dropIfExists('plan_distribution');
    }
}
