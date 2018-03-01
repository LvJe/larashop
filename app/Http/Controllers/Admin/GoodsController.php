<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/goods/index',['goods_list'=>Goods::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/goods/goods_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        Goods::create($inputs);
        return view('admin/common/jump_page',['msg'=>'成功删除 返回','url'=>route('goods.index'),'url_label'=>'商品列表']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods = Goods::Find($id);
        return view('admin/goods/goods_form',['goods'=>$goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $this->formInputs($request);
        Goods::where('goods_id',$id)->update($inputs);
        return view('admin/common/jump_page',['msg'=>'成功 返回','url'=>route('goods.index'),'url_label'=>'商品列表']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Goods::destroy($id);
        return view('admin/common/jump_page',['msg'=>'删除成功 返回','url'=>route('goods.index'),'url_label'=>'商品列表']);

    }

    private function formInputs(Request $request){
        $inputFields = ['goods_name','goods_sn','cat_id','shop_price','goods_desc'];
        $inputs = $request->only($inputFields);
        return $inputs;
    }
}
