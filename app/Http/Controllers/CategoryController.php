<?php

namespace App\Http\Controllers;

use App\models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category/index',['categories'=>CategoryModel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category/category_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $this->formInputs($request);
        CategoryModel::create($inputs);
        return view('common/jump_page',['msg'=>'成功 返回','url'=>'/category','url_label'=>'分类列表']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryModel $category)
    {
        return view('category/category_form',['cat'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $category)
    {
        return view('category/category_form',['cat'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $this->formInputs($request);
        CategoryModel::where('cat_id',$id)->update($inputs);
        return view('common/jump_page',['msg'=>'成功 返回','url'=>'/category','url_label'=>'分类列表']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryModel::destroy($id);
        return view('common/jump_page',['msg'=>'成功删除 返回','url'=>'/category','url_label'=>'分类列表']);
    }

    private function formInputs(Request $request){
        $input_fields = ['cat_name','parent_id','measure_unit','sort_order','is_show','show_in_nav','keywords','cat_desc'];
        $inputs = $request->only($input_fields);
        //待：写成中间件
        foreach ($input_fields as $v) {
            if ($inputs[$v] == null) {
                $inputs[$v] = '';
            }
        }
        return $inputs;
    }
}
