<?php

namespace App\Listeners;

use App\Events\UnusualLoginEvent;
use App\Mail\UnusualLoginMail;
use App\Notifications\PrivateChannelServices;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Kutia\Larafirebase\Facades\Larafirebase;

class UnusualLoginListener
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
     * @param  \App\Events\UnusualLoginEvent  $event
     * @return void
     */
    public function handle(UnusualLoginEvent $event)
    {
        $user = $event->user;
            $data = [
                'id' =>  $user->id,
                'event'   => 'UnUsualLogin',
                'to'      => 'User',
                'name' =>  $user->display_name,
                'avatar' =>  $user->avatar_url,
                // 'link' => route("vendor.dashboard"),
                'type' => 'api_login',
                'message' => __('We noticed a login from an unusual device for the account')
            ];

            $user->notify(new PrivateChannelServices($data));
            Larafirebase::withTitle('Unusual Login Detected')
            ->withBody("We noticed a login from an unusual device for the account.")
            ->sendMessage($user->fcm_token);
            Mail::to($user->email)->send(new UnusualLoginMail($user));
    }
}
