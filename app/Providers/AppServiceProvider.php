<?php

namespace App\Providers;

use App\Models\Plan;
use Illuminate\Support\Facades\App;
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


        view()->share( 'availableYears', Plan::getAvailableYears() );

        // šādi, lai būtu pieeja sesijai.. :(
        view()->composer('*', function ($view) {
            $view->with('schoolYear', \Session::get('schoolYear'));
        });
    }
}
