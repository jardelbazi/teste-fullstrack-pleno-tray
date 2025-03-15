<?php

namespace App\Services\Auth;

use App\DTOs\Auth\AuthUpdateDTO;
use App\Http\Requests\LoginRequest;

interface AuthServiceInterface
{
    public function login(LoginRequest $request): ?AuthUpdateDTO;
}
