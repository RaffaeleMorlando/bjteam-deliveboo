<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace("Api")->group(function (){
  //tutte i ristoranti in base alla categoria
  Route::get('restaurants/{categoryParam}', 'RestaurantController@getRestaurantsByCategory');

  //tutte le categorie
  Route::get('categories', 'RestaurantController@getCategories');

  //ristoranti da mostrare in homepage
  Route::get('restaurants', 'RestaurantController@getRestaurants');
});
