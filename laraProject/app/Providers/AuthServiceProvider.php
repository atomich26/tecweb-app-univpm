<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

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

        Gate::define('isAdmin', function($user){
            return $user->checkRole('admin');
        });
        
        Gate::define('isStaff', function($user){
            return $user->checkRole('staff');
        });
        
        Gate::define('isTecnico', function($user){
            return $user->checkRole('tecnico');
        });

        Gate::define('manageData', function($user){
            return $user->checkRole(['staff', 'admin']);
        });
    }
}
