<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany('App\Product')
        ->withPivot(['quantity']);
    }

    public function user_order() {
        return $this->belongsTo('App\User');
    }
}
