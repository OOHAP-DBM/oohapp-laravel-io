<?php
namespace Modules\Space\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\FrontendController;
use Modules\Space\Models\SpaceCategory;
use Modules\Space\Models\Tag;
use Modules\Space\Models\Space;

class CategorySpaceController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request, $slug)
    {
        $cat = SpaceCategory::where('slug', $slug)->first();
        if (empty($cat)) {
            return redirect('/space');
        }
        $listNews = Space::query();
        $listNews->select("core_space.*")
                ->join('core_space_category', function ($join) use($cat) {
                    $join->on('core_news_category.id', '=', 'core_news.cat_id')
                         ->where('core_news_category._lft', '>=', $cat->_lft)
                         ->where('core_news_category._rgt', '<=', $cat->_rgt);
                })
                ->where("core_news.status", "publish")
                ->groupBy('core_news.id');


        $translation = $cat->translate();

        $data = [
            'rows'           => $listNews->with("author")->with("category")->paginate(5),
            'model_category'    => SpaceCategory::where("status", "publish"),
            'model_tag'         => Tag::query(),
            'model_space'        => Space::where("status", "publish"),
            'breadcrumbs'    => [
                [
                    'name' => __('Space'),
                    'url'  => route('space.index')
                ],
                [
                    'name'  => $translation->name,
                    'class' => 'active'
                ],
            ],
            'page_title'=>$translation->name,
            'seo_meta'  => $cat->getSeoMetaWithTranslation(app()->getLocale(),$translation),
            'translation'=>$translation,
            'header_transparent'=>true,
        ];
        return view('Space::frontend.index', $data);
    }
}
