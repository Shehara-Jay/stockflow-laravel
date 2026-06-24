<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\OrderApiController;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function () {
    Route::apiResource('categories', CategoryApiController::class);
    Route::apiResource('products', ProductApiController::class);
    Route::apiResource('customers', CustomerApiController::class);
    Route::apiResource('orders', OrderApiController::class);
});