@extends('layout.bst');

@section('content')
    <h2 align="center" style="color:red;">订单列表</h2>

    <table  class="table table-bordered">
        <tr align="center">
            <td>订单ID</td><td>订单编号</td><td>价格</td><td>提交时间</td><td>订单状态</td>
        </tr>
        <tbody align="center">
        @foreach($list as $k=>$v)
            <tr>
                <td>{{$v['order_id']}}</td>
                <td>{{$v['order_sn']}}</td>
                <td>{{$v['order_amount']}}元</td>
                <td>{{date('Y-m-d H:i:s',$v['add_time'])}}</td>
                <td>
                    @if($v['is_pay'] == 0)
                        <a href="/pay/{{$v['order_id']}}" class="btn btn-danger">去支付</a>
                        @else
                            已支付
                        @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection