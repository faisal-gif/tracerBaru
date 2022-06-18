<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function($user){
            return $user->roles == "admin";
        });
        Gate::define('alumni', function($user){
            return $user->roles == "alumni";
        });
        Gate::define('jurusan', function($user){
            return $user->roles == "jurusan";
        });
        Gate::define('prodi', function($user){
            return $user->roles == "prodi";
        });
        Gate::define('superAdmin', function($user){
            return $user->roles == "superAdmin";
        });
        Gate::define('akreditasi', function($user){
            return $user->roles == "akreditasi";
        });
    }
}
