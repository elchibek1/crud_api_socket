<?php

use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\Passport\PassportController;
use App\Http\Controllers\Api\V1\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('categories', CategoryController::class)
        ->only('index', 'show');
    Route::apiResource('products', ProductController::class)
        ->only('index', 'show');
    Route::apiResource('passports', PassportController::class)
        ->only('index', 'show');
});

Route::middleware(['auth.basic', 'permission:create_category'])
    ->prefix('v1')
    ->group(function () {
        Route::apiResource('categories', CategoryController::class)
            ->except('index', 'show');

        Route::apiResource('products', ProductController::class)
            ->except('index', 'show');

        Route::apiResource('passports', PassportController::class)
            ->middleware('role:admin')
            ->except('index', 'show');
    });
