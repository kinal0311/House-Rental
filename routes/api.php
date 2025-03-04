<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\WishlistController ;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
    Route::put('/update-profile', [AuthController::class, 'updateProfile'])->middleware('auth:api');

});

Route::middleware('auth:api')->group(function () {
    Route::get('/properties', [PropertyController::class, 'index']);
    Route::post('/properties-store', [PropertyController::class, 'store']);
    Route::get('/properties/{id}', [PropertyController::class, 'show']);
    Route::get('/search-properties', [PropertyController::class, 'searchProperties']);
    Route::put('/properties/{id}', [PropertyController::class, 'update']);
    Route::delete('/properties/{id}', [PropertyController::class, 'destroy']);


    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::get('/cart', [CartController::class, 'showCart']);
    Route::delete('/cart/remove', [CartController::class, 'removeFromCart']);


    Route::post('/book-property', [BookingController::class, 'bookProperty']); // Initiate property booking
    Route::get('/payment-callback', [BookingController::class, 'paymentCallback'])->name('api.payment.callback'); // Handle payment callback


    Route::post('/wishlist/add', [WishlistController::class, 'add']);
    Route::get('/wishlist', [WishlistController::class, 'showWishlist']);
    Route::delete('/wishlist/remove', [WishlistController::class, 'remove']);
});

