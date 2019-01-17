<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    public $table = 'shop_goods';

    public $timestamps = false;

    public $updated_at=false;

    public $primaryKey = 'goods_id';

    //获取某字段时 格式化 该字段的值
    public function getPriceAttribute($price)
    {
        return $price / 100;
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price']=$price*100;
    }





}
