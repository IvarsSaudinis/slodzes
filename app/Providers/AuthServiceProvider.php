<?php

namespace App\Providers;

use App\Models\Modules;
use App\Models\Plan;
use App\Models\User;
use App\Policies\ModulesPolicy;
use App\Policies\PlanPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Plan::class => PlanPolicy::class,
        Modules::class => ModulesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
