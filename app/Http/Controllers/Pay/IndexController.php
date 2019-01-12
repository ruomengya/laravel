<?php

namespace App\Http\Controllers\Pay;

use App\Model\OrderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SebastianBergmann\ObjectReflector\ObjectReflectorTest;

class IndexController extends Controller
{
    /**
     *订单支付
     */
    public function order($oid)
    {
        //查询订单
        $order_info = OrderModel::where(['order_id' => $oid])->first();
        if($order_info -> is_pay == 1){
            echo '无订单';
            exit;
        }
        if(!$order_info){
            echo '订单不存在';
            exit;
        }

        if($order_info -> pay_time > 0){
            echo '此订单已被支付';
            exit;
        }

        //支付成功 修改支付时间
        OrderModel::where(['order_id'=>$oid])->update(['pay_time'=>time(),'pay_amount'=>rand(1111,9999),'is_pay'=>1]);
        header('Refresh:2;url=/center');
        echo '支付成功，正在跳转';
    }
}
