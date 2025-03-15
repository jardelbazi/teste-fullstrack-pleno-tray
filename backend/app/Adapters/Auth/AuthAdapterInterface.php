<?php

namespace App\Adapters\Auth;

use App\DTOs\Auth\AuthDTO;
use App\DTOs\Auth\AuthUpdateDTO;
use App\Http\Requests\LoginRequest;
use App\Models\User;

interface AuthAdapterInterface
{
    public function fromRequest(LoginRequest $request): AuthDTO;

    public function fromModel(User $user, string $token): AuthUpdateDTO;
}
