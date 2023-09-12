<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'category';
    public $timestamps = true;
    
    protected $dates = ['deleted_at'];
    protected $fillable = array('id','category_name', 'category_image', 'category_description');
    protected $visible = array('id','category_name', 'category_image', 'category_description');


    public function category_product()
    {
        return $this->hasMany('\Product', 'category_id');
    }

}