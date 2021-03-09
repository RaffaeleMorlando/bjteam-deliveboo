<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'status'
    ];

    /**
     * DB RELATIONSHIP
     */

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
