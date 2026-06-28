<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ItemController;
use App\Http\Controllers\Api\v1\AuthController;

Route::post('/v1/register', [AuthController::class, 'register']);
Route::post('/v1/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/logout', [AuthController::class, 'logout']);

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/v1/items', [ItemController::class, 'index']);
    // Route lainnya...
});
});
Route::apiResource('/v1/items', ItemController::class);