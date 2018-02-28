@extends('layouts.xianchang')

@section('content')
    <div class="list-div" id="listDiv">
        <a style="float: right;" href="{{route('category.create')}}">添加</a>
        <table width="100%" cellspacing="1" cellpadding="2" id="list-table" border="1">
            <tr>
                <th>分类名称</th>
                <th>商品数量</th>
                <th>数量单位</th>
                <th>导航栏	</th>
                <th>是否显示</th>
                <th>价格分级</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
            @foreach ($categories as $cat)
            <tr align="center">
                <td align="left" class="first-cell" >
                    <span><a href="goods.php?act=list&cat_id={$cat.cat_id}">{{$cat->cat_name}}</a></span>
                </td>
                <td width="10%">{{$cat->goods_num}}</td>
                <td width="10%">{{$cat->measure_unit}}</td>
                <td width="10%">{{$cat->show_in_nav}}</td>
                <td width="10%">{{$cat->is_show}}</td>
                <td>{{$cat->grade}}</td>
                <td width="10%" align="right">{{$cat->sort_order}}</td>
                <td width="24%" align="center">
                    <a href="category.php?act=move&cat_id={$cat.cat_id}">转移商品</a> |
                    <a href="{{route('category.edit',[$cat->cat_id])}}">编辑</a> |
                    <form style="display: inline-block" method="post" action="{{ route('category.destroy',['cat_id'=>$cat->cat_id]) }}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input type="submit" value="移除">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection