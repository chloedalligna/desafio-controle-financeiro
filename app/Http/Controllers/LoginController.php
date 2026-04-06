<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use function Symfony\Component\String\s;

class LoginController extends Controller
{

    private UsersRepository $usersRepository;
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function index()
    {
        return view('login.index');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $this->usersRepository->userIdOnSession($request);

        return to_route('transactions.index');
    }

    public function destroy(Request $request)
    {
        session()->forget('user_id');
        Auth::logout();

        return to_route('login');
    }
}
