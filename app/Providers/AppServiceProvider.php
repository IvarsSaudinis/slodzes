<?php

namespace App\Providers;

use App\Models\Plan;
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
        if(!App::environment(['testing'])) {
            view()->share( 'availableYears', Plan::getAvailableYears() );
        }
        // šādi, lai būtu pieeja sesijai.. :(
        view()->composer('*', function ($view) {
            $view->with('schoolYear', \Session::get('schoolYear'));
        });
    }
}
