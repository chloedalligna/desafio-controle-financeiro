<?php

namespace App\Repositories;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Support\Collection;

class UsersRepository
{
    public function findByEmail(string $email)
    {
        $users = User::all();
        return $users->where('email', $email);
    }

    public function userIdOnSession(LoginRequest|UserFormRequest $request): void
    {
        $userRequest = self::findByEmail($request->email);

        foreach ($userRequest as $data) {
            $userId = $data->attributesToArray()['id'];
            session(['user_id' => $userId]);
        }
    }
}
