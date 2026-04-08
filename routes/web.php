<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/store', [LoginController::class, 'store'])->name('signin');

    Route::get('/register', [UserController::class, 'create'])->name('signup');
    Route::post('/register', [UserController::class, 'store'])->name('register');
});

//Route::get('/email/verify', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');
//
//Route::post('/email/verification-notification', function (Request $request) {
//    $request->user()->sendEmailVerificationNotification();
//    return back()->with('message', 'Link de verificação enviado!');
//})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
//
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//    return to_route('transactions.index');
//})->middleware(['auth', 'signed'])->name('verification.verify');

//Route::middleware(['auth', 'verified'])->group(function () {
Route::middleware(['auth',])->group(function () {
    Route::get('/', function () {
        return to_route('transactions.index');
    });

    Route::resource('/transactions', TransactionController::class)
        ->except('show');

    Route::resource('/categories', CategoryController::class)
        ->except('show');

    Route::get('/users/{id}/show', [UserController::class, 'show'])->name('users.show');

    Route::get('/users/{id}/premium/subscription', [UserController::class, 'subscription'])->name('subscription');

    Route::get('/users/{id}/premium/subscription/cancel', [UserController::class, 'cancelSubscription'])->name('subscription.cancel');

    Route::get('/users/premium/payment', [UserController::class, 'payment'])->name('payment');

    Route::get('/users/{id}/premium', [UserController::class, 'premium'])->name('premium');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
