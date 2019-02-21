@extends('layout.bst')


@section('content')

    <h2 align="center" style="color:red;">{{$title}}</h2>

    <table  class="table table-bordered">
        <tr align="center">
        <td>商品id</td><td>商品名字</td><td>库存</td><td>价格</td><td>操作</td>
        </tr>
        <tbody align="center">
            @foreach($list as $k=>$v)
                <tr>
                    <td>{{$v['goods_id']}}</td>
                    <td>{{$v['goods_name']}}</td>
                    <td>{{$v['goods_num']}}</td>
                    <td>{{$v['price']/100}}</td>
                    <td><a href="/cartlist/{{$v['goods_id']}}">详细信息</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection