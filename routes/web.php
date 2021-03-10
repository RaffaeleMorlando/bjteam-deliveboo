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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/questions', 'Admin\DashboardController@index')->middleware('role:admin');

Route::get('/customer/questions', 'Customer\DashboardController@index')->middleware('role:customer');

// vista non visibile, serve a salvare le domande dell'utente customer
Route::post('/customer/questions/store', 'Customer\DashboardController@questions')->name('customer.questions');
