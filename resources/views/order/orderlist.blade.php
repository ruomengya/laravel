@extends('layout.bst');

@section('content')
    <h2 align="center" style="color:red;">确认订单</h2>

    <table  class="table table-bordered">
        <tr align="center">
            <td>订单编号</td><td>价格</td><td>提交时间</td>
        </tr>
        <tbody align="center">
            <tr>
                <td>{{$order_sn}}</td>
                <td>{{$order_amount}}</td>
                <td>{{date('Y-m-d H:i:s',$add_time)}}</td>
            </tr>

        </tbody>
    </table>
    <a href="/pay/{{$order_id}}" id="submit_order" class="btn btn-info btn-block "> 确认支付 </a>


@endsection