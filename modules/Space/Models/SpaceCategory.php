<?php
namespace Modules\Space\Models;

use App\BaseModel;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\SEO;

class SpaceCategory extends BaseModel
{
    use SoftDeletes;
    use NodeTrait;
    protected $table = 'core_space_category';
    protected $fillable = [
        'name',
        'content',
        'status',
        'parent_id'
    ];
    protected $slugField     = 'slug';
    protected $slugFromField = 'name';
    protected $seo_type = 'space_category';

    public static function getModelName()
    {
        return __("Space Category");
    }

    public function filterbyCat($id)
    {
        $posts = Space::where('news_id', $this->id)->get();
        return $posts;
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'name');
        if (strlen($q)) {

            $query->where('name', 'like', "%" . $q . "%");
        }
        $a = $query->orderBy('id', 'desc')->limit(10)->get();
        return $a;
    }

    public function getDetailUrl($locale = false)
    {
        return route('space.admin.category.index',['slug'=>$this->slug]);
    }

    public function dataForApi(){
        $translation = $this->translate();
        return [
            'name'=>$translation->name,
            'id'=>$this->id,
            'url'=>$this->getDetailUrl()
        ];
    }

    public function space(){
        return $this->hasMany(Space::class,'cat_id');
    }
    

}
