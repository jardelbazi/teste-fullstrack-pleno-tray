<?php

namespace App\Adapters\Auth;

use App\Adapters\User\UserAdapter;
use App\DTOs\Auth\AuthDTO;
use App\DTOs\Auth\AuthUpdateDTO;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthAdapter implements AuthAdapterInterface
{
    public function fromRequest(LoginRequest $request): AuthDTO
    {
        return new AuthDTO(
            email: $request->email,
            password: $request->password,
        );
    }

    public function fromModel(User $user, string $token): AuthUpdateDTO
    {
        $userAdapter = new UserAdapter();

        return new AuthUpdateDTO(
            email: $user->email,
            token: $token,
            user: $userAdapter->fromModel($user)
        );
    }
}
