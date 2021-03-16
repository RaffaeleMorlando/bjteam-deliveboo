<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{

  //recuperare i ristoranti
  public function getRestaurants() {
    $restaurants = Restaurant::with('categories', 'products')->get();

    return response()->json($restaurants);
  }
}
