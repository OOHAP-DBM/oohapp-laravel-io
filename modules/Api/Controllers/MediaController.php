<?php
namespace Modules\Api\Controllers;
use Illuminate\Http\Request;
use Modules\Media\Models\MediaFile;

class MediaController extends \Modules\Media\Admin\MediaController
{
    public function find(Request $req)
    {
        return MediaFile::find($req->image_id);
    }
}
