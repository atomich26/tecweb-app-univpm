<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Resources\Prodotto;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('editProdotto', function($user, $prodottoID){
            $prodotto = Prodotto::findOrFail($prodottoID);

            if($user->checkRole('admin')){
                return true;
            }
            else if($user->checkRole('staff')){
                return $prodotto->utenteID == null || $prodotto->utenteID == $user->ID;
            }
            else 
                return false;
        });
    }
}
