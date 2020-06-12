<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    public function product(){
        return $this->belongsTo('App\Product-Keywords');
    }
}
