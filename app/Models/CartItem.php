<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model 
{

    protected $table = 'cart_items';
    public $timestamps = true;
    protected $fillable = array('cart_id', 'product_id', 'qty', 'options');
    protected $visible = array('cart_id', 'product_id', 'qty', 'options');

    public function product()
    {
        return $this->belongsTo('Product', 'product_id');
    }

}