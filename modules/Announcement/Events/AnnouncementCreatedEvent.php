<?php
namespace Modules\Announcement\Events;


use Modules\Announcement\Models\Announcement;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AnnouncementCreatedEvent
{
    use SerializesModels;
    public $announcement;

    public function __construct(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }
}
