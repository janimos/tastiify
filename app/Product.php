<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function country(){
        return $this->hasMany('App\Country');
    }
    public function comment(){
        return $this->belongsTo('App\Product-Comments');
    }
    public function keyword(){
        return $this->belongsTo('App\Product-Keywords');
    }
    public function order(){
        return $this->belongsTo('App\Order-Products');
    }
    public function cart(){
        return $this->belongsTo('App\Cart-Products');
    }
}
