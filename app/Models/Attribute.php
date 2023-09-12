<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model 
{

    protected $table = 'attributes';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $visible = array('name');

}