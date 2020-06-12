<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
