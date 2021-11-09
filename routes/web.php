<?php

use App\Http\Controllers\Admin\PlateController;
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
    Route::resource('plates', 'PlateController');

    // orders routes
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/{plate}', 'OrderController@show')->name('orders.show');
    // Rotta SoftDelete
    // Route::delete('/orders/{plate}', 'OrderController@destroy')->name('orders.destroy');

    // Dovremo inserire in un secondo momento la rotta delle statistiche ordini MEMO



    Route::resource('plates', 'PlateController');
});



// ROTTE DEL FRONTEND

Route::get('/', function () {
    return view('guests.welcome');
});
