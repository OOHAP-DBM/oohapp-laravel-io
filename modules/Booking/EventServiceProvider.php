<?php

namespace Modules\Booking;

use Modules\Booking\Events\BookingCreatedEvent;
use Modules\Booking\Events\EnquiryReplyCreated;
use Modules\Booking\Listeners\BookingCreatedListen;
use Modules\Booking\Listeners\SendEnquiryReplyNotification;

class EventServiceProvider extends \Illuminate\Foundation\Support\Providers\EventServiceProvider
{
    protected $listen = [
        EnquiryReplyCreated::class=>[
            SendEnquiryReplyNotification::class
        ],
        // BookingCreatedEvent::class=>[
        //     BookingCreatedListen::class
        // ]
    ];

}
