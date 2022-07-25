<?php

namespace Database\Seeders;

use App\Models\EduWeekType;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedEduCalendar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create basic week type
        //DB::table('edu_week_type')->insert(['id' => 1, 'name' => 'Mācības']);
        //DB::table('edu_week_type')->insert(['id' => 2, 'name' => 'Brīvlaiks']);

        //create basic years
        $years = [
            ['name' => '20/21'],
            ['name' => '21/22'],
            ['name' => '22/23'],
            ['name' => '23/24'],
            ['name' => 'DEMO'],
        ];
       // DB::table('edu_year')->insert($years);

        // build and seed simple weeks
        $start_date = '2022-09-01';
        for($a = 1; $a < 43; $a++)
        {
            $week = ['edu_year_id' => 3, 'number' => $a, 'start_date' => $start_date, 'edu_week_type_id' => 1 ];
            DB::table('edu_week')->insert($week);

            $start_date = Carbon::parse($start_date)->addWeek();
        }


    }
}
