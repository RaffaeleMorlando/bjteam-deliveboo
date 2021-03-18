<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;

class RestaurantController extends Controller
{

  //recuperare i ristoranti in base alla categoria
  public function getRestaurantsByCategory($categoryParam) {

    $allRestaurants = Restaurant::with("categories", "products")->get(); //Tutti i ristoranti
    $filterRestaurants = []; //Ristoranti filtrati

    foreach ($allRestaurants as $restaurant) {
      foreach ($restaurant->categories as $category) {

        if ($category->name == $categoryParam) {
          $filterRestaurants[] = $restaurant;
        }
      }
    }

    return response()->json($filterRestaurants);
  }

  //recuperare tutte le categorie
  public function getCategories()
  {
    $categories = Category::all();

    return response()->json($categories);
  }

  //ristoranti da mostrare in homepage
  public function getRestaurants() {

    $homeRestaurants = Restaurant::limit(10)->get();

    return response()->json($homeRestaurants);
  }
}
