<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model 
{

    protected $table = 'carts';
    public $timestamps = true;

    public function items()
    {
        return $this->hasMany('CartItem', 'cart_id');
    }

}