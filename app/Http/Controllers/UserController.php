<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
    public function store(Request $request)
    {
        $userData = $request->except(['_token']);
        $userData['password'] = Hash::make($userData['password']);

        $user = User::create($userData);
        Auth::login($user);

        return to_route('transactions.index');
    }

    /**
     * Display the specified resource.
     */
//    public function show(string $id)
//    {
//        $user = User::find($id);
//
//        return view('users.show')->with('users', $user);
//    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        $user = User::find($id);
//
//        if ($user) {
//            return redirect()->route('users.index')->with('msg', 'Usuário não encontrado.');
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
//        return redirect()->route('users.index')->with('msg', 'Usuário atualizado com sucesso.');
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
//        return redirect()->route('users.index')->with('msg', 'Usuário deletado com sucesso.');
//    }
}
