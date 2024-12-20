<?php

namespace Modules\Announcement\Listeners;

use App\Notifications\PrivateChannelServices;
use App\User;
use Modules\Announcement\Events\AnnouncementCreatedEvent;

class AnnouncementCreatedListen
{
    public function handle(AnnouncementCreatedEvent $event)
    {
        $announcement = $event->announcement;
        $user = User::find($announcement->user_id);
        //case guest checkout

        $data = [
            'id'      => $announcement->id,
            'event'   => 'AnnouncementCreatedEvent',
            'name'    => $user->name,
            'avatar'  => $user->avatar_url,
            'type'    => $announcement->object_model,
            'message' => $announcement->content
        ];

        //to user
        if (!empty($user)) {
            $roles = [
                1 => 'admin',
                2 => 'vendor',
                3 => 'customer',
            ];
            $data['link'] = '#';
            $data['to'] = $roles[$user->role_id] ?? 'unknown';
            $user->notify(new PrivateChannelServices($data));
        }
    }
}
