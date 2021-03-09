<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'status'
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
