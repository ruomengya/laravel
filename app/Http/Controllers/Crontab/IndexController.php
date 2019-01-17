<?php

namespace App\Http\Controllers\Crontab;

use App\Model\OrderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function orderDelete()
    {
        $order_id = 0;
        $list = OrderModel::where( 'order_id', '>' ,$order_id)->get()->toArray();
        foreach ($list as $k=>$v) {
            if(time()-$v['add_time']>300 && $v['is_pay'] == 0){
                OrderModel::where(['order_id' => $v['order_id']])->update(['is_delete'=>1]);
            }
        }
        echo date('Y-m-d H:i:s');
    }
}
