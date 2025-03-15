<?php

namespace App\Services\User;

use App\DTOs\User\UserUpdateDTO;
use App\Http\Requests\UserRequest;

interface UserServiceInterface
{
    public function create(UserRequest $userDTO): UserUpdateDTO;
}
