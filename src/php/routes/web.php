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

Route::get('/', 'ItemsController@showItems')->name('top');

Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'RegisterController@register')->name('register');

Route::get('/login', 'LoginController@showLoginForm')->name('login');
Route::post('/login', 'LoginController@login')->name('login');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/search', 'ItemsController@searchItems')->name('search');
Route::get('/item/{id}', 'ItemsController@showItemDetail')->name('item');

Route::get('/cart', 'CartController@showCartItems')->name('cart');
Route::post('/cart/add', 'CartController@addCartItems')->name('cart.add');
Route::post('/cart/delete', 'CartController@DeleteCartItems')->name('cart.delete');

Route::middleware('auth')->group(function () {
    Route::get('/order/confirm', 'OrderController@showOrderConfirm')->name('order.confirm');
    Route::post('/order/buy', 'OrderController@buyOrderItems')->name('order.buy');
    Route::get('/order/complete', 'OrderController@showOrderComplete')->name('order.complete');
});
