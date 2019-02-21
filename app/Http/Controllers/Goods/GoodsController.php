<?php

namespace App\Http\Controllers\Goods;

use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }
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
