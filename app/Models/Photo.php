<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model 
{

    protected $table = 'photos';
    public $timestamps = false;
    protected $fillable = array('parent', 'product_id', 'title', 'description', 'width', 'height');
    protected $visible = array('parent', 'product_id', 'title', 'description', 'width', 'height');

}