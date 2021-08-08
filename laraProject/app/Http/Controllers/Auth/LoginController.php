<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo(){
        $userRole = auth()->user()->role;

        switch ($userRole) {
            case 'tecnico': return "/";
                break;
            case 'staff':
                return "/";
                break;
            case 'admin':
                return "/";
                break;
            default:
                return "/";
                break;
        }
    }

    /**
     * Effettua l'override del metodo predefinito nel trait AuthenticatesUsers.
     * Restituisce il nome dell'attributo dell'utente che vogliamo utilizzare come username
     */
    public function username(){
        return "username";
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
