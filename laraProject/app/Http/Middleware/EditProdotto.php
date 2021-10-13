<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Auth;
use \App\Models\Resources\Prodotto;
use \App\User;

class EditProdotto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $prodotto = Prodotto::findOrFail($request->route('prodottoID'));

        if(Auth::check()){
            if($user->checkRole('admin'))
                return $next($request);

            if($user->checkRole('staff')){
                if($prodotto->utenteID == null || $prodotto->utenteID == $user->ID)
                    return $next($request);
                else
                    return abort(403); 
            }
        }

        return abort(403);
    }
}
