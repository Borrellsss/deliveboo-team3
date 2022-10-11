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

    protected $fillable = [
        'customer_name' => 'required|max:255',
        'customer_email' => 'required|email|max:255',
        'customer_phone_number' => 'required|max:30',
        'address' => 'required|max:60000'
    ];
}
