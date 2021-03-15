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
    return view('layouts.backend');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //da cancellare



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.restaurants.')
    ->group(function(){

        Route::resource('restaurants/products', 'ProductController');

        //Restituisce la vista con le domande per la creazione del ristorante
        Route::get('restaurants/create', 'RestaurantController@create')->name('create');

        Route::post('restaurants/store', 'RestaurantController@store')->name('store');

        Route::get('restaurants/dashboard', 'DashboardController@index')->name('dashboard');

        // cambiare il logo del ristorante
        Route::put("restaurants/dashboard/logo/{id}", "DashboardController@changeLogo")->name('dashboard.logo');

        Route::get('restaurants/order', 'OrderController@index')->name('order.index');

        Route::get('restaurants/order', 'OrderController@chart')->name('order.chart');


    });
