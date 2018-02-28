<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryModel extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey  = 'cat_id';
    protected $fillable = ['cat_name','parent_id','measure_unit','sort_order','is_show','show_in_nav','keywords','cat_desc'];
    protected $table = 'category';
    //
}
