<?php

namespace App\DTOs\User;

class UserUpdateDTO extends UserDTO
{
    public function __construct(
        public string $id,
        string $name,
        string $email,
        ?string $password = null,
    ) {
        parent::__construct(
            name: $name,
            email: $email,
            password: $password,
        );
    }
}
