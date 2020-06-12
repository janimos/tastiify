<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product-Keywords extends Model
{
    public function product(){
        return $this->hasMany('App\Product');
    }
    public function keyword(){
        return $this->hasMany('App\Keyword');
    }
}
