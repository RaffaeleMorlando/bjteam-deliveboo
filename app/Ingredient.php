<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'supplement_price',
    ];

    /**
     * DB RELATIONSHIP
     */

    public function products(){
        return $this->belongsToMany('App\Product', 'product_ingredient');
    }
}
