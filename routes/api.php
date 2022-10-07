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

// creo la route per per la visione di tutti i ristoranti con vuejs
Route::get('/{id}/menu', 'Api\ProductController@restaurantMenu');

// creo l'api per ottenere tutte le categorie
Route::get('/restaurants-categories', 'Api\CategoryController@getAllCategories');

// creo l'api per ottenere tutti i ristoranti filtrati per categoria
Route::get('/restaurants', 'Api\RestaurantsController@getRestaurantsByCategory');





