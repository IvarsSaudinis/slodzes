<?php

namespace App\Providers;

use App\Models\EduYear;
use App\Models\Plan;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        view()->share('availableYears', Plan::getAvailableYears());

       if(!Session::has('edu_year'))
        {
            Session::put(['edu_year '=> EduYear::orderBy('id', 'desc')->first()] );
        }

        // šādi, lai būtu pieeja sesijai.. :( default sesijas vērtību derētu pārrēķināt
        view()->composer('layouts.app', function ($view) {

        //    $edu_year = EduYear::orderBy('id', 'desc')->first();

            $view->with('edu_year', EduYear::find(Session::get('edu_year', EduYear::orderBy('id', 'desc')->first() )->id ));
        });
    }
}
