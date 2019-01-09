@extends('layout.bst')


@section('content')

    <button class="btn btn-danger">{{$title}}</button>

    <table  class="table table-bordered">
        <tr align="center">
            <td>商品id</td><td>商品名字</td><td>库存</td><td>价格</td><td>操作</td>
        </tr>
        <tbody align="center">
        @foreach($list as $k=>$v)
            <tr>
                <td>{{$v['goods_id']}}</td>
                <td>{{$v['goods_name']}}</td>
                <td>{{$v['price']/100}}</td>
                <td>{{date('Y-m-d H:i:s ' , $v['add_time'])}}</td>
                <td><a href="/cartdel/{{$v['goods_id']}}">删除</a></td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <a href="/orderadd" id="submit_order" class="btn btn-info "> 提交订单 </a>
@endsection