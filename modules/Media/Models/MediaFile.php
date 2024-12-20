<?php
namespace Modules\Media\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Modules\Media\Admin\MediaController;
use Modules\Media\Helpers\FileHelper;

class MediaFile extends BaseModel
{
    use SoftDeletes;
    protected $table = 'media_files';

    public static function findMediaByName($name)
    {
        return MediaFile::where("file_name", $name)->firstOrFail();
    }

    public function cacheKey()
    {
        return sprintf("%s/%s", $this->getTable(), $this->getKey());
    }


    public static function saveUploadFile($file,$group = 'image'){

        if (empty($file)) {
            return false;
        }

        MediaController::validateFile($file,$group);


        $folder = '';
        $id = Auth::id();
        if ($id) {
            $folder .= sprintf('%04d', (int)$id / 1000) . '/' . $id . '/';
        }
        $folder = $folder . date('Y/m/d');
        $newFileName = md5($file->getClientOriginalName().uniqid());
        $fileNameOnly =  Str::slug(substr($file->getClientOriginalName(), 0, strrpos($file->getClientOriginalName(), '.')));
        $i = 0;
        do {
            $newFileName2 = $newFileName . ($i ? $i : '');
            $testPath = $folder . '/' . $newFileName2 . '.' . $file->getClientOriginalExtension();
            $i++;
        } while (Storage::disk('uploads')->exists($testPath));

        $check = $file->storeAs( $folder, $newFileName2 . '.' . $file->getClientOriginalExtension(),'uploads');

        if ($check) {
            try {
                $fileObj = new self();
                $fileObj->file_name = $fileNameOnly;
                $fileObj->file_path = $check;
                $fileObj->file_size = $file->getSize();
                $fileObj->file_type = $file->getMimeType();
                $fileObj->file_extension = $file->getClientOriginalExtension();
                $fileObj->save();
                return $fileObj->id;
            } catch (\Exception $exception) {
                Storage::disk('uploads')->delete($check);
                return false;
            }
        }
        return false;
    }
    public function getThumbIcon(){
        if(preg_match("/image/i", $this->file_type)){
            return get_file_url($this->id);
        }else{
            return asset('images/file_icon.png');
        }
    }

    public function getEditPath(){
        $storage = Storage::disk('uploads');
        $ex_file = explode('/',$this->file_path);
        $fileName = array_pop($ex_file);
        $filePath = implode('/',$ex_file);
        $old_path = "$filePath/old/$fileName";
        if ($storage->exists($old_path)){
            return asset("uploads/$old_path");
        } else {
            return asset("uploads/$this->file_path");
        }
    }

    public function editImage($image_data){
        $img = str_replace('data:image/jpeg;base64,', '', $image_data);
        $fileData = base64_decode($img);

        $storage = Storage::disk('uploads');
        // Check Old file
        $ex_file = explode('/',$this->file_path);
        $fileName = array_pop($ex_file);
        $oldPath = implode('/',$ex_file).'/old/';
        if (!$storage->exists($oldPath)){
            $storage->makeDirectory($oldPath, 0775, true); //creates directory
        }

        // Move file to old
        if (!$storage->exists($oldPath.$fileName)){
            $storage->copy($this->file_path, $oldPath.$fileName);
        }

        // Put file
        $storage->put($this->file_path, $fileData,'public');

        // Clear thumb image
        $size_mores = FileHelper::list_size();
        if(!empty($size_mores)){
            foreach ($size_mores as $size){
                $file_size = substr($this->file_path, 0, strrpos($this->file_path, '.')) . '-' . $size . '.' . $this->file_extension;
                if($storage->exists($file_size)){
                    $storage->delete($file_size);
                }
            }
        }

        $result = [
            'src'     => get_file_url($this->id,'large'),
            'old'     =>  asset("uploads/".$oldPath.$fileName),
            'message' => __('Update Successful'),
            'status'=>0
        ];
        return $result;
    }

    public function scopeInFolder($query,$folder_id){
        return $query->where('folder_id',$folder_id);
    }

    public function forceDelete()
    {
        Cache::forget($this->cacheKey() . ':' . $this->id);
        return parent::forceDelete();
    }


    public function viewUrl(): Attribute
    {
        return Attribute::make(
            get:function($value){
        switch ($this->driver){
            case "s3":
            case "gcs":
                return $this->generateUrl($this->file_path);
                break;
            default:
                return asset('uploads/' . $this->file_path);
                break;
        }
    }
        );
    }

    public function getViewUrl($size = 'thumb'){

        return config('bc.preview_media_link') ? url('media/preview/'.$this->id.'/'.$size) : get_file_url($this,$size);
    }

    /**
     * @param $file_path
     * @param float|int $mins Minutes, default 1 day
     * @return string
     */
    public function generateUrl($file_path,$mins = 24 * 60){
        return Storage::disk($this->driver)->temporaryUrl(
            $file_path, now()->addMinutes($mins)
        );
    }

    public function download($name = '',$headers = []){
        return Storage::disk($this->driver)->download($this->file_path,$name,$headers);
    }
}
