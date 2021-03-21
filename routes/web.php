<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {  //da cancellare
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home'); //da cancellare

//rotta momentanea per la home page VERA



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.restaurants.')
    ->group(function(){

        Route::resource('restaurants/products', 'ProductController');

        //Restituisce la vista con il form per la creazione del ristorante
        Route::get('restaurants/create', 'RestaurantController@create')->name('create');
        //salvo i dati del nuovo ristorante
        Route::post('restaurants/store', 'RestaurantController@store')->name('store');
        Route::put('restaurants/update/{id}', 'RestaurantController@update')->name('update');

        //restituisce le informazino necessarie per la "home page" della dashboard (backend)
        Route::get('restaurants/dashboard', 'DashboardController@index')->name('dashboard');
        // // cambiare il logo del ristorante ?? da cancellare (utilizzare la edit del ristorante)
        // Route::put("restaurants/dashboard/logo/{id}", "DashboardController@changeLogo")->name('dashboard.logo');

        //restituisce tutti gli ordini del ristorante
        Route::get('restaurants/orders', 'OrderController@index')->name('orders.index');

        //restituisce la vista con il grafico
        Route::get('restaurants/orders/charts', 'OrderController@chart')->name('orders.chart');


    });

  Route::namespace('Guest')
      ->group(function(){

        Route::get("home", "GuestController@homePage")->name("home");
        Route::get("restaurants/{slug}", "GuestController@menuRestaurant")->name("menu-restaurant");

      });
