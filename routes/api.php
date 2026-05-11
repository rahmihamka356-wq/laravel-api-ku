<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('items', ItemController::class);

Route::get('/identitas', function () {
    return response()->json([
        'pesan' => 'API Berhasil!',
        'data' => [
            'nama' => 'Rahmi Hamka',
            'nim' => '131'
        ]
    ], 200);
});