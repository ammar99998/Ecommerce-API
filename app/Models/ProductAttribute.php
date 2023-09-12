<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model 
{

    protected $table = 'product_attribute';
    public $timestamps = true;
    protected $fillable = array('product_id', 'attribute_id', 'value_id');
    protected $visible = array('product_id', 'attribute_id', 'value_id');

    public function attribute()
    {
        return $this->belongsTo('Attribute', 'attribute_id');
    }

}