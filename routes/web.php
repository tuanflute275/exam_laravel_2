<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('/')->group(function () {
    Route::get('/', [PageController::class, 'home_page'])->name('home');
    Route::get('detail/{id}', [PageController::class, 'detail_page'])->name('detail');
    Route::get('category/{id}', [PageController::class, 'category_page'])->name('category');
    Route::get('shop', [PageController::class, 'shop_page'])->name('shop');
    Route::get('checkout', [PageController::class, 'checkout_page'])->name('checkout');
    Route::post('checkout', [PageController::class, 'post_checkout'])->name('post_checkout');
    Route::post('cart/{id}', [CartController::class, 'add_to_cart'])->name('shop.cart');
    Route::get('/clear', [CartController::class, 'clear'])->name('shop.clear_cart');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});
