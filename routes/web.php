<?php

use Illuminate\Support\Facades\Route;

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

// Viste che portano alle domande
Route::get('/seller/questions', 'Seller\RestaurantController@index')->middleware('role:seller');
Route::get('/customer/questions', 'Customer\CustomerController@index')->middleware('role:customer');

// vista non visibile, serve a salvare le risposte degli utenti (customer/seller)
Route::post('/customer/questions/store', 'Customer\CustomerController@saveQuestions')->name('customer.questions');
Route::post('/seller/questions/store', 'Seller\RestaurantController@saveQuestions')->name('seller.questions');

// rotte che portano alla CRUD dei prodotti
Route::prefix("seller")
  ->namespace("Seller")
  ->middleware("auth")
  ->name("seller.")
  ->group(function() {

    Route::resource("products", "ProductController");

  });
