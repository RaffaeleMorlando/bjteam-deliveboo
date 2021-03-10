<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'restaurant_id',
        'image'
    ];

    /**
     * DB RELATIONSHIP
     */

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }
}
