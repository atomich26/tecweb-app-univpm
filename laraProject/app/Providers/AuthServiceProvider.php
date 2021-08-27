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

        Gate::define('hasProfilePage', function($user){
            return $user->checkRole(['tecnico', 'staff']);
        });

        Gate::define('editMalfunzionamenti', function($user, $product){

            if($user->checkRole('admin')){
                return true;
            }
            elseif($user->checkRole('staff')){

                if($product->utenteID != null)
                    return $user->ID == $product->utenteID;
                else
                    return true;
            }
            else
                return false;
        });
    }
}
