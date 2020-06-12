<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user(){
        return $this->hasMany('App\User');
    }
    public function product(){
        return $this->belongsTo('App\Cart-Products');
    }
}
