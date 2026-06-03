<?php

use Illuminate\Support\Facades\Route;

// Langkah 5: Public Routes (Bisa diakses tanpa login)
Route::post('register', 'App\Http\Controllers\AuthController@register');
Route::post('login', 'App\Http\Controllers\AuthController@login');

// Langkah 6 & 9: Protected Routes (Dibungkus auth:sanctum)
Route::middleware('auth:sanctum')->group(function () {
    
    // Resource Category (Kecuali fungsi destroy / delete)
    Route::apiResource('categories', 'App\Http\Controllers\CategoryController')->except(['destroy']);
    // Khusus route DELETE category hanya bisa diakses oleh admin
    Route::delete('categories/{category}', 'App\Http\Controllers\CategoryController@destroy')->middleware('role:admin');
    
    // Resource Item (Kecuali fungsi destroy / delete)
    Route::apiResource('items', 'App\Http\Controllers\ItemController')->except(['destroy']);
    // Khusus route DELETE item hanya bisa diakses oleh admin
    Route::delete('items/{item}', 'App\Http\Controllers\ItemController@destroy')->middleware('role:admin');
    
});