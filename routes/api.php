<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('product-ratings', ProductRatingController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'loginShow'])->name('login');
Route::get('/public-data', [DataController::class, 'publicData']);
Route::middleware('auth:sanctum')->get('/private-data', [DataController::class, 'privateData']);
