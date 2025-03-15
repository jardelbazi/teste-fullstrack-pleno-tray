<?php

namespace App\Adapters\User;

use App\DTOs\User\UserDTO;
use App\DTOs\User\UserUpdateDTO;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserAdapter implements UserAdapterInterface
{
    public function fromRequest(UserRequest $request): UserDTO
    {
        return new UserDTO(
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );
    }

    public function fromModel(User $user): UserUpdateDTO
    {
        return new UserUpdateDTO(
            id: $user->id,
            name: $user->name,
            email: $user->email,
        );
    }

    public function toModel(UserDTO $userDTO): User
    {
        return new User([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => $userDTO->password,
        ]);
    }
}
