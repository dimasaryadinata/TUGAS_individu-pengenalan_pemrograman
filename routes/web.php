<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;


// ROUTE HALAMAN UTAMA (PUBLIC)
// Menggunakan method index() untuk menampilkan semua produk
Route::get('/', [ProductController::class, 'index'])->name('home');
// Route::get('/login', [LoginController::class, 'showLoginForm']);
// Route::get('/register', [LoginController::class, 'showRegistrationForm']);
// Route::post('/register', [LoginController::class, 'register'])->name('register');
// Route::post('/login', [LoginController::class, 'login'])->name('login');

    // Route untuk menampilkan dashboard admin dengan daftar produk dan form input
    Route::get('/products', [ProductController::class, 'adminIndex']);
    
    // Route POST untuk menyimpan data produk baru
    Route::post('/products', [ProductController::class, 'store'])->name('products');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('/orders', [OrderController::class, 'adminIndex']);
    Route::post('/contact', [OrderController::class, 'store'])->name('contact.store');
