<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController; // Baris ini WAJIB ada di paling atas

Route::get('/', function () {
    return view('welcome');
});

// Pastikan baris ini ada dan tidak ada titik di akhirnya
Route::get('/perpustakaan', [BookController::class, 'index'])->name('perpustakaan.index');
Route::post('/perpustakaan/store', [BookController::class, 'store'])->name('perpustakaan.store');