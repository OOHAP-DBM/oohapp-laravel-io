<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/16/2019
 * Time: 2:05 PM
 */
namespace Modules\Space\Models;

use App\BaseModel;

class SpaceCategoryTranslation extends BaseModel
{
    protected $table = 'core_space_category_translations';
    protected $fillable = ['name', 'content'];
    protected $seo_type = 'space_cat_translation';
    protected $cleanFields = [
        'content'
    ];
}