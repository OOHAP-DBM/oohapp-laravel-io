<?php
namespace Modules\Announcement\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Announcement\Models\Announcement;

class AnnouncementEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $announcement;
    public $user;

    public function __construct(Announcement $announcement, $user)
    {
        $this->announcement = $announcement;
        $this->user = $user;
    }

    public function build()
    {
        $subject = $this->announcement->title;

        return $this->subject($subject)->view('Announcement::emails.announcement')->with([
            'announcement' => $this->announcement,
            'user' => $this->user,
        ]);
    }
}
