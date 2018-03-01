@extends('admin.layouts.xianchang')

@section('content')
    <!-- start add new category form -->
    <div class="main-div">
        <form action="{{ empty($goods)?route('goods.store'):route('goods.update',['goods_id'=>$goods->goods_id]) }}" method="post" name="theForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(isset($goods))
            {{ method_field('PUT') }}
            @endif
            <table width="100%" id="general-table">
                <input type="hidden" name="goods_id" value="{{$goods->goods_id??0}}">
                <tr>
                    <td class="label">商品名称：</td>
                    <td>
                        <input type='text' name='goods_name' maxlength="20" size='27' value="{{$goods->goods_name??''}}">
                        <font color="red">*</font>
                    </td>
                </tr>
                <tr>
                    <td class="label">货号：</td>
                    <td>
                        <input type='text' name='goods_sn' maxlength="20" size='27' value="{{$goods->goods_sn??''}}">
                    </td>
                </tr>

                <tr id="measure_unit">
                    <td class="label">分类：</td>
                    <td>
                        <input type="text" name='cat_id' value='{{$goods->cat_id??'0'}}'>
                    </td>
                </tr>
                <tr>
                    <td class="label">售价：</td>
                    <td>
                        <input type="text" name='shop_price' value="{{$goods->shop_price??'0.00'}}" size="15">
                    </td>
                </tr>
                <tr>
                    <td class="label">描述：</td>
                    <td>
                        <input type="text" name='goods_desc' value="{{$goods->goods_desc??''}}" size="15">
                    </td>
                </tr>
            </table>
            <div class="button-div">
                <input type="submit" value="提交"/>
            </div>
        </form>
    </div>

@endsection