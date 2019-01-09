<?php

namespace App\Http\Controllers\Goods;

use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function goodsList()
    {
        $data = GoodsModel::all();
        $list = [
            'title' => '商品列表',
            'list'  => $data
        ];
        return view( 'goods.goodslist' , $list );
    }

    public function index($goods_id)
    {
        $where = [
            'goods_id' => $goods_id
        ];

        $data = GoodsModel::where($where)->first();

        $goods = [
            'goods' => $data
        ];

        return view('cart.cartadd' , $goods);
    }
}
