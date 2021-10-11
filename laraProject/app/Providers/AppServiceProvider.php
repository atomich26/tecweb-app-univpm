<?php

namespace App\Providers;

use App\Models\Resources\Faq;
use App\Observers\FaqObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;


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
        Schema::defaultStringLength(Config::get('strings.global.default'));

        Response::macro('actionResponse', function($routeName, $status, $message){
            return redirect()->route($routeName)->with('status', $status)
                ->with('message', $message);
        });
    }
}
