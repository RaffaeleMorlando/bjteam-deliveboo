<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Order;

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

  //ristorante da mostrare in show
  public function getRestaurantMenu($slug) {

    $menuRestaurant = Restaurant::where('slug',$slug)->with('products','categories')->get();

    return response()->json($menuRestaurant);
  }

  //recupero tutti gli ordini del ristorante
  public function getOrders($slug) {

    $restaurant = "ciao";
    dd(Auth::user());

    $allOrders = Order::all();
    $orders = [];

    foreach ($allOrders as $order) {
      foreach ($order->products as $product) {

        if ($product->restaurant_id === $restaurant->id && !in_array($order, $orders)) {
          $orders[] = $order;

        }
      }
    }

    return response()->json($orders);
  }

}
