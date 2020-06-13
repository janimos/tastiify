<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function description(){
        return $this->belongsTo('App\ProductDescriptionPhoto');
    }
    public function comment(){
        return $this->belongsTo('App\ProductComments');
    }
    public function keyword(){
        return $this->belongsTo('App\ProductKeywords');
    }
    public function order(){
        return $this->belongsTo('App\OrderProducts');
    }
    public function cart(){
        return $this->belongsTo('App\CartProducts');
    }
}
