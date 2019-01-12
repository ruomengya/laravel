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
            'order_amount'   =>  $order_amount/100
        ];

        $oid = OrderModel::insertGetId($data);

        if(!$oid){
            header('Refresh:2;url=cartshow');
            echo '生成订单失败';
            die;
        }else{
            echo '下单成功';
            header('Refresh:2;url=orderlist');
            CartModel::where(['uid'=>session()->get('uid')])->delete();
        }



    }

    public function orderList()
    {

        $data = OrderModel::where(['uid' => session()->get('uid')]) -> orderBy('order_id','desc') -> first()->toArray();
        if($data['is_pay'] == 1){
            echo '无订单';
            exit;
        }
        return view('order.orderlist',$data);
    }

    public function orderShow()
    {

        $data = OrderModel::where(['uid' => session()->get('uid')]) ->get()->toArray();

        $list = [
            'list' => $data
        ];
        return view('order.ordershow',$list);
    }
}
