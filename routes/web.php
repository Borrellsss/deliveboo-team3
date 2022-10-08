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
Route::middleware('auth')
->prefix('admin')
->namespace('Admin')
->name('admin.')
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/products', 'ProductController');
    Route::get('/orders', 'OrdersController@index')->name('orders');
    Route::get('/statistics', 'StatisticsController@index')->name('statistics');
});


// rotta home pubblica, porzione guest
Route::get('{any?}' , function(){
    return view('guest/home');
    })->where('any' , '.*');