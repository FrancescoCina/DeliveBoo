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


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// ROTTE DEL BACKEND

Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    // restaurants routes
    Route::get('/', 'RestaurantController@index')->name('restaurants.index');
    Route::get('/restaurants/create', 'RestaurantController@create')->name('restaurants.create');
    Route::post('/restaurants', 'RestaurantController@store')->name('restaurants.store');
    // plates routes
    Route::get('/plates', 'PlateController@index')->name('plates.index');
    Route::get('/plates/{plate}', 'PlateController@show')->name('plates.show');
    Route::get('/plates/create', 'PlateController@create')->name('plates.create');
    Route::post('/plates', 'PlateController@store')->name('plates.store');
    Route::get('/plates/edit/{plate}', 'PlateController@edit')->name('plates.edit');
    Route::patch('/plates/{plate}', 'PlateController@update')->name('plates.update');
    Route::delete('/plates/{plate}', 'PlateController@destroy')->name('plates.destroy');

    // orders routes
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{plate}', 'OrderController@show')->name('orders.show');
    // Rotta SoftDelete
    // Route::delete('/orders/{plate}', 'OrderController@destroy')->name('orders.destroy');

    // Dovremo inserire in un secondo momento la rotta delle statistiche ordini MEMO
});



// ROTTE DEL FRONTEND

Route::get('/', function () {
    return view('guests.welcome');
});
