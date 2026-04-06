<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use App\Repositories\UsersRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UsersRepository $usersRepository;
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $users = User::all();
//
//        return view('users.index')->with('users', $users);
//    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        $userData = $request->except(['_token']);
        $userData['password'] = Hash::make($userData['password']);
        $user = User::create($userData);

        $this->usersRepository->userIdOnSession($request);

        Auth::login($user);
        event(new Registered($user));

        return to_route('transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, Request $request)
    {
        $user = User::find($id);
        $msg = $request->session()->get('msg');

        return view('users.show', [
            'user' => $user,
            'msg' => $msg,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        $user = User::find($id);
//
//        if ($user) {
//            return to_route('users.index')->with('msg', 'Usuário não encontrado.');
//        }
//
//        return view('users.edit')->with('users', $user);
//    }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, string $id)
//    {
//        $user = User::find($id);
//
//        $user->update($request->all());
//
//        return to_route('users.index')->with('msg', 'Usuário atualizado com sucesso.');
//    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(string $id)
//    {
//        $user = User::find($id);
//
//        $user->delete();
//
//        return to_route('users.index')->with('msg', 'Usuário deletado com sucesso.');
//    }

    public function subscription(int $id)
    {
        $user = User::find($id);

        return view('premium.subscription', [
            'user' => $user,
        ]);
    }

    public function cancelSubscription(Request $request, int $id)
    {
        $user = User::find($id);
        $user->is_premium = false;
        $user->save();

        $request->session()->flash('msg', 'Assinatura do Plano Premium desativada com sucesso.');

        return to_route('users.show', [
            'user' => $user,
            'id' => $user->id,
        ]);
    }

    public function payment()
    {
        return view('premium.payment');
    }

    public function premium(Request $request, int $id)
    {
        $user = User::find($id);
        $user->is_premium = true;
        $user->save();

        $request->session()->flash('msg', 'Assinatura do Plano Premium ativada com sucesso!');

        return to_route('users.show', session('user_id'));
    }

}
