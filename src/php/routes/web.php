<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FavoriteController;

// ログイン、ログアウト関連
Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);

// 商品一覧、商品詳細
Route::get('/', [ItemsController::class, 'showItems'])->name('top');
Route::get('/item/{item}', [ItemsController::class, 'showItemDetail'])->name('item');

// 商品検索
Route::get('/search', [ItemsController::class, 'searchItems'])->name('search');

// カートの中身の表示、カートの中身の削除
Route::get('/cart', [CartController::class, 'showCartItems'])->name('cart');
Route::post('/cart/delete', [CartController::class, 'DeleteCartItems'])->name('cart.delete');

// 要ログイン(カートに商品を追加、注文確認、注文、注文完了)
Route::middleware('auth')->group(function () {
    Route::post('/cart/add', [CartController::class, 'addCartItems'])->name('cart.add');
    Route::get('/order/confirm', [OrderController::class, 'showOrderConfirm'])->name('order.confirm');
    Route::post('/order/buy', [OrderController::class, 'buyOrderItems'])->name('order.buy');
    Route::get('/order/complete', [OrderController::class, 'showOrderComplete'])->name('order.complete');
    Route::get('/order/confirm_in_order', [OrderController::class, 'showDeliveryForm'])->name('order.address');
});

// トップページに遷移
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 問い合わせ関連
Route::get('/contact', [ContactsController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactsController::class, 'confirm'])->name('contact.confirm');
Route::get('/contact/confirm', [ContactsController::class, 'index'])->name('contact.index');
Route::post('/contact/thanks', [ContactsController::class, 'send'])->name('contact.send');
Route::get('/contact/thanks', [ContactsController::class, 'index'])->name('contact.index');

// いいねの保存と削除
Route::post('items/{item}/favorites', [FavoriteController::class, 'store'])->name('favorites');
Route::post('items/{item}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
