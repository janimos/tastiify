<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }
    public function product(){
        return $this->belongsTo('App\Order-Products');
    }
}
