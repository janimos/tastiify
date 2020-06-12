<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order-Products extends Model
{
    public function order(){
        return $this->hasMany('App\Order');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
}
