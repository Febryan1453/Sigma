<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        $time = Carbon::now()->toDateTimeString();
        $user_id = $event->user_id;
        $name    = $event->name;
        $email   = $event->email;
        $role    = $event->role;
        $ip      = \request()->ip();

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $id = substr(str_shuffle($permitted_chars), 0, 12);

        DB::table('history_logins')->insert([
            'id'            => $id,
            'user_id'       => $user_id,
            'name'          => $name,
            'email'         => $email,
            'role'          => $role,
            'ip'            => $ip,
            'waktu_login'   => $time,
        ]);
    }
}
