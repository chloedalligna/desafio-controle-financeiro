<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        return to_route('transactions.index');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        return to_route('login');
    }
}
