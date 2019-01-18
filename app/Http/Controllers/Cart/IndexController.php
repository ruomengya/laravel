<?php

namespace App\Http\Controllers\Cart;

use App\Model\CartModel;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }
    public function index(Request $request)
    {

        $cart_goods = CartModel::where(['uid' => Auth::id()])->get()->toArray();
        //print_r($cart_goods);exit;
        if(empty($cart_goods)){
            echo '购物车为空';
            die;
        }
        if($cart_goods){
            foreach( $cart_goods as $k=>$v){
                $goods_info = GoodsModel::where(['goods_id' => $v['goods_id']])->first()->toArray();
                $goods_info['num'] = $v['num'];
                $goods_info['created_at'] = $v['created_at'];
                $list[] = $goods_info;
            }
        }
        $data = [
            'title' => '购物车列表',
            'list' => $list
        ];
        return view( 'cart.cartlist' , $data);
    }

    /*
     * 购物车添加
     */
    public function cartAdd(Request $request){

        $goods_id = $request->input('goods_id');
        $num = $request->input('num');
        //检查库存
        $goods_num = GoodsModel::where(['goods_id' => $goods_id]) -> value('goods_num');
        if($goods_num<$num){
            $response = [
                'error' => '5001',
                'msg'  => '库存不足'
            ];
            return $response;
        }

        $cart = CartModel::where(['goods_id' => $goods_id])->first();

        if($cart){
            $goods = GoodsModel::where(['goods_id' => $goods_id])->first()->toArray();
            if($num > $goods['goods_num']){
                $response = [
                    'error' => '5001',
                    'msg'  => '库存不足'
                ];
                return $response;
            }else{
                $data = [
                    'goods_num' =>$goods['goods_num'] - $num ,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $goods_update = GoodsModel::where(['goods_id' => $goods_id])->update($data);
                if($goods_update){
                    $response = [
                        'error' => 0,
                        'msg'  => '加入购物车成功'
                    ];

                }else{
                    $response = [
                        'error' => '5001',
                        'msg'  => '加入购物车失败'
                    ];
                    return $response;
                }
                $data1 = [
                    'num' =>$cart['num'] + $num,
                    'created_at' => date('Y-m-d H:i:s'),
                    'session_token' => session()->get('u_token')
                ];
                CartModel::where(['id' => $cart['id']])->update($data1);
                return $response;
        }
        }else{
            //写入数据库
            $goods = GoodsModel::where(['goods_id' => $goods_id])->first()->toArray();
            $data = [
                'goods_id' => $goods_id,
                'num' => $num,
                'created_at' => date('Y-m-d H:i:s'),
                'uid' => Auth::id(),
                'session_token' => session() -> get('u_token')
            ];

            $cid = CartModel::insertGetId($data);

            if(!$cid){
               $response= [
                   'error' => '5001',
                   'msg' => '添加购物车失败'
               ];
                return $response;
            }

            $response = [
                'error' => 0,
                'msg'   => '添加成功'
            ];

            $data = [
                'goods_num' =>$goods['goods_num'] - $num ,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            GoodsModel::where(['goods_id' => $goods_id])->update($data);
            return $response;
        }
    }

    /*
     * 购物车删除
     */

    public function cartDel($goods_id){
        $where = [
            'uid' =>Auth::id(),
            'goods_id' => $goods_id
        ];
        $res = CartModel::where($where)->delete();

        if($res){
            echo '删除成功';
            header('Location:/cartshow');

        }
    }
}
