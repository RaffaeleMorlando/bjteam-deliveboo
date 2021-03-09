<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    protected $fillable = [
        'restaurant_id',
        'image'
    ];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
}
