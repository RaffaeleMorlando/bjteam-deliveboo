<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'guest_name',
      'guest_address',
      'order_number',
      'total_price'
    ];

    /**
     * DB RELATIONSHIP
     */
    public function products(){
        return $this->belongsToMany('App\Product', 'product_order');
    }
}
