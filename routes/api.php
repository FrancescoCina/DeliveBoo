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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->group(function () {

    Route::get('/restaurants', 'RestaurantController@index');
    Route::get('/restaurants/{restaurant}', 'RestaurantController@show');
});


// Rotte API
/* 
    - index dei ristoranti (in RestaurantController)
    - index dei piatti associati al singolo risorante (in RestaurantController)
    - chiamata in post per attribuire quantità a tabella pivot order_plate (in PlateController)
    - chiamata in post per scrivere l'ordine sul DB nella tabella Orders (in OrderController)
    - chiamata in post per attribuire quantità a tabella pivot order_plate (in OrderController) --> dalla pagina del Carrello





*/
