<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('id','name', 'sku', 'description', 'price', 'active');
    protected $visible = array('id','name', 'sku', 'description', 'price', 'active');

    public function photos()
    {
        return $this->hasMany('Photo', 'product_id');
    }

    public function attributes()
    {
        return $this->hasMany('ProductAttribute', 'product_id');
    }

    public function carts()
    {
        return $this->hasManyThrough('Cart', 'CartItem');
    }

    public function category()
    {
        return $this->hasOne('Category', 'category_id');
    }
}