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

Route::get('/home', 'HomeController@index')->name('home'); //da cancellare



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){

        Route::resource('products', 'ProductController');

        //Restituisce la vista con le domande per la creazione del ristorante
        Route::get('restaurants/create', 'RestaurantController@create')->name('restaurants.create');

        Route::post('restaurants/store', 'RestaurantController@store')->name('restaurants.store');

        Route::get('restaurants/dashboard', 'DashboardController@index')->name('restaurants.dashboard');

    });
