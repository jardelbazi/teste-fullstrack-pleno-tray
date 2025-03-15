<?php

namespace App\Adapters\User;

use App\DTOs\User\UserDTO;
use App\DTOs\User\UserUpdateDTO;
use App\Http\Requests\UserRequest;
use App\Models\User;

interface UserAdapterInterface
{
    public function fromRequest(UserRequest $request): UserDTO;

    public function fromModel(User $user): UserUpdateDTO;

    public function toModel(UserDTO $userDTO): User;
}
