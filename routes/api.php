<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// product
Route::get('products', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);
Route::get('product/{id}', [ProductController::class, 'show']);

// cart
Route::get('carts', [CartController::class, 'index']);
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('cart/{id}', [CartController::class, 'destroy']);