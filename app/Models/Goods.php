<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['goods_name','goods_sn','cat_id','shop_price','goods_desc'];
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
}
