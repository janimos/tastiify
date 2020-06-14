<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    public function cart(){
        return $this->belongsTo('App\Cart');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
}
