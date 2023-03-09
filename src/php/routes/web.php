<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrderController;

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
Route::get('/', [ItemsController::class, 'showItems'])->name('top');

Route::get('/search', [ItemsController::class, 'searchItems'])->name('search');
Route::get('/item/{item}', [ItemsController::class, 'showItemDetail'])->name('item');

Route::get('/cart', [CartController::class, 'showCartItems'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addCartItems'])->name('cart.add');
Route::post('/cart/delete', [CartController::class, 'DeleteCartItems'])->name('cart.delete');

Route::middleware('auth')->group(function () {
    Route::get('/order/confirm', [OrderController::class, 'showOrderConfirm'])->name('order.confirm');
    Route::post('/order/buy', [OrderController::class, 'buyOrderItems'])->name('order.buy');
    Route::get('/order/complete', [OrderController::class, 'showOrderComplete'])->name('order.complete');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');