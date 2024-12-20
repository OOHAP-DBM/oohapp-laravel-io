<?php
namespace Modules\Announcement\Models;
use App\BaseModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use Modules\Booking\Models\Booking;
use Illuminate\Support\Facades\Mail;
use Modules\Booking\Models\Service;
use Modules\Announcement\Emails\AnnouncementEmail;


class Announcement extends BaseModel
{
    protected $table = 'bravo_announcements';
    protected $casts = [
        'only_for_user'      => 'array',
    ];

    protected $fillable = [
        'title',
        'content',
        'status',
        'user_type',
        'only_for_user',
        'role_id', 
        'via', 
        'date', 
        'image_id'
    ];

   

     /**
     * Using for select2
     * @return array
     */
    public function getUsersToArray(){
        $data = [];
        if(!empty($this->only_for_user)){
            $users = User::where('status','publish')->whereIn('id',$this->only_for_user)->get();
            foreach ($users as $item){
                $data[] = [
                    'id'   => $item->id,
                    'text' => "(#{$item->id}): {$item->getDisplayName()}"
                ];
            }
        }
        return $data;
    }

    public static function sendAnnouncementEmails($userId, $data)
    {
        $user = User::find($userId);
        if($user){
            try {

                Mail::to($user->email)->send(new AnnouncementEmail($data, $user));

            }catch (\Exception | \Swift_TransportException $exception){

                Log::warning('AnnouncementEmail: '.$exception->getMessage());
            }
        }
    }
}
