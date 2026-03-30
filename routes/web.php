<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/store', [LoginController::class, 'store'])->name('signin');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/register', [UserController::class, 'create'])->name('signup');
    Route::post('/register', [UserController::class, 'store'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return to_route('transactions.index');
    });

    Route::resource('/transactions', TransactionController::class);

    Route::resource('/categories', CategoryController::class);

    Route::resource('/types', TypeController::class);
});
