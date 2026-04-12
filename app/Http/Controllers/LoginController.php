<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use function Laravel\Prompts\table;
use function Symfony\Component\String\s;

use Illuminate\Support\Facades\DB;


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
//        $this->usersRepository->userIdOnSession($request);
//        dd(session()->all());

        $request->session()->flash('msg', 'Usuário logado com sucesso!');

        return to_route('transactions.index');
    }

    public function destroy(Request $request)
    {
        // Step 1: Log out the user
        Auth::logout();

        // Step 2: Invalidate the session
        $request->session()->invalidate();

        // Step 3: Regenerate CSRF token
        $request->session()->regenerateToken();

        // FONTE: https://needlaravelsite.com/blog/laravel-auth-logout-explained

        return to_route('login');
    }
}
