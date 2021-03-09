<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'logo',
        'address',
        'long',
        'lat',
        'p_iva',
        'type', //cancellare?
        'phone'
    ];


    /**
     * DB RELATIONSHIP
     */
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function categories(){
        return $this->belongsToMany('App\Category', 'restaurant_category');
    }

    public function carouselImages(){
        return $this->hasMany('App\CarouselImage');
    }


}
