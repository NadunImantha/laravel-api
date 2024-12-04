<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('products', [ProductController::class, 'index']);
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'store'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'removeFromCart'])->name('remove.from.cart');