<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

        // create basic roles
        // @ https://spatie.be/docs/laravel-permission/v5/basic-usage/basic-usage
        Role::create(['name'=> 'Administartors']);
        Role::create(['name'=> 'Mācībspēks']);
        Role::create(['name'=> 'Lietotājs']);

    }
}
