<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart-Products extends Model
{
    public function cart(){
        return $this->hasMany('App\Cart');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
}
