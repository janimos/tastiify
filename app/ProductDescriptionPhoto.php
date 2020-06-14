<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescriptionPhoto extends Model
{
    protected $guarded = [];

    public function product(){
        return $this->hasMany('App\Product');
    }
}
