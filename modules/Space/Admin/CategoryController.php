<?php
namespace Modules\Space\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\AdminController;
use Modules\Space\Models\SpaceCategory;
use Illuminate\Support\Str;
use Modules\Space\Models\SpaceCategoryTranslation;

class CategoryController extends AdminController
{
    public function __construct()
    {
        $this->setActiveMenu(route('space.admin.index'));
    }

    // public function index(Request $request)
    // {
    //     $this->checkPermission('space_manage_others');

    //     $catlist = new SpaceCategory;
    //     if ($catename = $request->query('s')) {
    //         $catlist = $catlist->where('name', 'LIKE', '%' . $catename . '%');
    //     }
    //     $catlist = $catlist->orderby('name', 'asc');
    //     $rows = $catlist->get();

    //     $data = [
    //         'rows'        => $rows->toTree(),
    //         'row'         => new SpaceCategory(),
    //         'breadcrumbs' => [
    //             [
    //                 'name' => __('Space'),
    //                 'url'  => route('space.admin.index')
    //             ],
    //             [
    //                 'name'  => __('Category'),
    //                 'class' => 'active'
    //             ],
    //         ],
    //         'translation'=>new SpaceCategoryTranslation()
    //     ];
    //     return view('Space::admin.category.index', $data);
    // }
    public function index(Request $request)
{
    $this->checkPermission('space_manage_others');

    // Fetch categories
    $catlist = new SpaceCategory();
    if ($catename = $request->query('s')) {
        $catlist = $catlist->where('name', 'LIKE', '%' . $catename . '%');
    }
    $catlist = $catlist->orderby('name', 'asc');
    $categories = $catlist->get(); // Retrieve all categories

    $data = [
        'rows'        => $categories, // Use for listing in table
        'categories'  => $categories, // Use for dropdown
        'row'         => new SpaceCategory(),
        'breadcrumbs' => [
            [
                'name' => __('Space'),
                'url'  => route('space.admin.index'),
            ],
            [
                'name'  => __('Category'),
                'class' => 'active',
            ],
        ],
    ];

    return view('Space::admin.category.index', $data);
}


    public function edit(Request $request, $id)
    {
        // dd($request->all());
        $this->checkPermission('space_manage_others');
        $row = SpaceCategory::find($id);
        // dd($row);

        $translation = $row->translate($request->query('lang',get_main_lang()));
        // dd($row);
// dd($row->translate($request->query('lang',get_main_lang())));

        if (empty($row)) {
            // dd("here");
            return redirect(route('space.admin.category.index'));
        }
        $data = [
            'row'     => $row,
            'translation'     => $translation,
            'parents' => SpaceCategory::get()->toTree(),
            'enable_multi_lang'=>true
        ];
        return view('Space::admin.category.detail', $data);
    }

    public function store(Request $request, $id){
        $this->checkPermission('space_manage_others');

        if($id>0){
            $row = SpaceCategory::find($id);
            if (empty($row)) {
                return redirect(route('space.admin.category.index'));
            }
        }else{
            $row = new SpaceCategory();
            $row->status = "publish";
        }

        $row->fill($request->input());
        $res = $row->saveOriginOrTranslation($request->input('lang'));

        if ($res) {
            if($id > 0 ){
                return back()->with('success',  __('Category updated') );
            }else{
                return redirect(route('space.admin.category.index'))->with('success', __('Category created') );
            }
        }
    }

    public function bulkEdit(Request $request)
    {
        $this->checkPermission('space_manage_others');
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) or !is_array($ids)) {
            return redirect()->back()->with('error', __('Please select at least 1 item!'));
        }
        if (empty($action)) {
            return redirect()->back()->with('error', __('Please select an Action!'));
        }
        if ($action == 'delete') {
            foreach ($ids as $id) {
                $query = SpaceCategory::where("id", $id)->first();
                if(!empty($query)){
                    $query->delete();
                }
            }
        }
        return redirect()->back()->with('success', __('Update success!'));
    }

    public function getForSelect2(Request $request)
    {
        $pre_selected = $request->query('pre_selected');
        $selected = $request->query('selected');

        if($pre_selected && $selected){
            $item = SpaceCategory::find($selected);
            if(empty($item)){
                return response()->json([
                    'text'=>''
                ]);
            }else{
                return response()->json([
                    'text'=>$item->name
                ]);
            }
        }
        $q = $request->query('q');
        $query = SpaceCategory::select('id', 'name as text')->where("status","publish");
        if ($q) {
            $query->where('name', 'like', '%' . $q . '%');
        }
        $res = $query->orderBy('id', 'desc')->limit(20)->get();
        return response()->json([
            'results' => $res
        ]);
    }
}
