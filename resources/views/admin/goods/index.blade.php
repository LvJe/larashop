@extends('admin.layouts.xianchang')

@section('content')
        <a href="{{route('goods.create')}}" style="float: right;">添加</a>
        <table cellpadding="3" cellspacing="1" border="1">
            <tr>
                <th>编号</th>
                <th>商品名称</th>
                <th>货号</th>
                <th>价格</th>
                <th>上架</th>
                <th>精品	</th>
                <th>新品</th>
                <th>热销</th>
                <th>推荐排序</th>
                <th>库存</th>
                <th>虚拟销量</th>
                <th>操作</th>
            </tr>
            @foreach($goods_list as $goods)
            <tr>
                <td>{{$goods->goods_id}}</td>
                <td>{{$goods->goods_name}}</td>
                <td>{{$goods->goods_sn}}</td>
                <td>{{$goods->shop_price}}</td>
                <td>{{$goods->is_on_sale}}</td>
                <td>{{$goods->is_best}}</td>
                <td>{{$goods->is_new}}</td>
                <td>{{$goods->is_hot}}</td>
                <td>{{$goods->sort_order}}</td>
                <td>{{$goods->goods_number}}</td>
                <td>{{$goods->virtual_sales}}</td>
                <td>
                    <a href="{{route('goods.edit',['goods_id'=>$goods->goods_id])}}">编辑</a>
                    <form action="{{route('goods.destroy',['goods_id'=>$goods->goods_id])}}" method="post" style="display: inline-block">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" value="移除">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
@endsection