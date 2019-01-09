<?php

namespace App\Http\Controllers\Order;

use App\Model\CartModel;
use App\Model\GoodsModel;
use App\Model\OrderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function orderAdd()
    {
        //查询购物车数据
        $cart_goods = CartModel::where(['uid'=>session() -> get('uid')]) -> orderBy('id', 'desc')->get()->toArray();
        
        if(empty($cart_goods)){
            die('购物车为空');
        }

        $order_amount = 0;

        foreach($cart_goods as $k=>$v){
            $goods_info =  GoodsModel::where(['goods_id' => $v['goods_id']])->first()->toArray();
            $goods_info['goods_num'] = $v['num'];
            $list[] = $goods_info;

            //计算订单总价

            $order_amount += $goods_info['price'] * $v['num'];
        }

        $order_sn = OrderModel::generateOrderSN();

        $data = [
            'order_sn'  =>  $order_sn,
            'uid'   =>  session() -> get('uid'),
            'add_time'  =>  time(),
            'order_amount'   =>  $order_amount
        ];

        $oid = OrderModel::insertGetId($data);

        if(!$oid){
            header('Refresh:2;url=cartshow');
            echo '生成订单失败';
            die;
        }

        echo '下单成功,订单号：'.$order_sn.' 跳转支付';

        //清空购物车
        CartModel::where(['uid'=>session()->get('uid')])->delete();

    }
}
