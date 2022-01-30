<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname', 50)->change();
            $table->string('job_title')->after('surname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->truncate();

        Schema::table('users', function (Blueprint $table) {
            $table->integer('surname')->change();
            $table->dropColumn('job_title');
        });
    }
}
