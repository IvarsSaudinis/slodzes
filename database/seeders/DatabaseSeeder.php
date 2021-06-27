<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Ivars',
            'surname' => 'Šaudinis',
            'job_title' => 'Programmētājs',
            'email' => 'ivars@ivars.lv',
            'password' => Hash::make('password'),
        ]);


        \App\Models\User::factory(200)->create();

        $this->call([
            ModulesSeeder::class,
            // un citas klases
        ]);
    }
}
