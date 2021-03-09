<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'restaurant_id',
        'user_id',
        'order_code',
        'total_price'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'product_order');
    }
}
