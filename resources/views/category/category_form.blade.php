@extends('layouts.xianchang')

@section('content')
    <!-- start add new category form -->
    <div class="main-div">
        <form action="{{ empty($cat)?route('category.store'):route('category.update',['cat_id'=>$cat->cat_id]) }}" method="post" name="theForm" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(isset($cat))
            {{ method_field('PUT') }}
            @endif
            <table width="100%" id="general-table">
                <input type="hidden" name="cat_id" value="{{$cat->cat_id??0}}">
                <tr>
                    <td class="label">分类名称：</td>
                    <td>
                        <input type='text' name='cat_name' maxlength="20" size='27' value="{{$cat->cat_name??''}}">
                        <font color="red">*</font>
                    </td>
                </tr>
                <tr>
                    <td class="label">上级分类：</td>
                    <td>
                        {{$cat->parent_id??0}}
                        <select name="parent_id">
                            <option value="0">顶级分类</option>
                        </select>
                    </td>
                </tr>

                <tr id="measure_unit">
                    <td class="label">数量单位：</td>
                    <td>
                        <input type="text" name='measure_unit' value='{{$cat->measure_unit??''}}'>
                    </td>
                </tr>
                <tr>
                    <td class="label">排序：</td>
                    <td>
                        <input type="text" name='sort_order' value="{{$cat->sort_order??50}}" size="15">
                    </td>
                </tr>

                <tr>
                    <td class="label">是否显示：</td>
                    <td>
                        <input type="radio" name="is_show" value="1" {{($cat->is_show??0)==1?'checked':''}}> 是
                        <input type="radio" name="is_show" value="0" {{($cat->is_show??0)==0?'checked':''}}> 否
                    </td>
                </tr>
                <tr>
                    <td class="label">是否显示在导航栏：</td>
                    <td>
                        <input type="radio" name="show_in_nav" value="1" {{($cat->show_in_nav??0)==1?'checked':''}}> 是
                        <input type="radio" name="show_in_nav" value="0" {{($cat->show_in_nav??0)==0?'checked':''}}> 否
                    </td>
                </tr>
                {{--<tr>--}}
                    {{--<td class="label">设置为首页推荐：</td>--}}
                    {{--<td>--}}
                        {{--<input type="checkbox" name="cat_recommend[]" value="1"> 精品--}}
                        {{--<input type="checkbox" name="cat_recommend[]" value="2"> 最新--}}
                        {{--<input type="checkbox" name="cat_recommend[]" value="3"> 热门--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td class="label">筛选属性</td>--}}
                    {{--<td></td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td class="label">价格区间个数</td>--}}
                    {{--<td>--}}
                        {{--<input type="text" name="grade" v size="40"/> <br/>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td class="label">分类的样式表文件:</td>--}}
                    {{--<td></td>--}}
                {{--</tr>--}}
                <tr>
                    <td class="label">关键字:</td>
                    <td><input type="text" name="keywords" value="{{$cat->keywords??''}}" size="50">
                    </td>
                </tr>

                <tr>
                    <td class="label">分类描述:</td>
                    <td>
                        <textarea name='cat_desc' rows="6" cols="48">{{$cat->cat_desc??''}}</textarea>
                    </td>
                </tr>
            </table>
            <div class="button-div">
                <input type="submit" value="提交"/>
            </div>
        </form>
    </div>

@endsection