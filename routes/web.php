<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/ebooks', [BookController::class, 'ebooks'])->name('ebooks.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Pastikan file view dashboard ada
    })->name('dashboard');
});

