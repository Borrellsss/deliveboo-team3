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

// rotta per la visione di tutti i ristoranti
Route::get('/user', 'Api\UserRestaurantController@allRestaurant');

// creo la route per per la visione di tutti i post con vuejs
Route::get('/{id}/menu', 'Api\ProductController@restaurantMenu');

// Rotte per la gestione dei pagamenti con braintree:
// Rotta che genera il token
Route::get('orders/generate', 'Api\Orders\OrderController@generate');
// Rotta che effettua la transazione
Route::post('orders/make/payment', 'Api\Orders\OrderController@makePayment');


