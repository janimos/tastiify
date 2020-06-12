<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product-Comments extends Model
{
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
}
