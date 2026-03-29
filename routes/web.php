<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/transactions');
});

Route::resource('/transactions', TransactionController::class);
