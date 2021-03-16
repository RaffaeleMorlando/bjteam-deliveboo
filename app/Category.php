<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'image'
    ];

    /**
     * DB RELATIONSHIP
     */
    public function restaurants()
    {
        return $this->belongsToMany('App\Restaurant', 'restaurant_category');
    }

}
