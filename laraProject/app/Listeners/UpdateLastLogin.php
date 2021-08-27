<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use DateTime;

class UpdateLastLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handleOnLogin(Login $event)
    {
        $last_login = $event->user->last_login;
        $current_login = new DateTime('now');

        if($last_login == null)
            $last_login = $current_login;

        Cache::forever('last_login_timestamp', $last_login);

        $event->user->last_login = $current_login;
        $event->user->save();
    }

    public function handleOnLogout(Logout $event){
        Cache::forget('last_login_timestamp');
    }
}
