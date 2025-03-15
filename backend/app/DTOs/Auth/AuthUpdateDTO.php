<?php

namespace App\DTOs\Auth;

use App\DTOs\User\UserDTO;

class AuthUpdateDTO extends AuthDTO
{
    public function __construct(
        public string $token,
        public UserDTO $user,
        string $email,
        ?string $password = null,
    ) {
        parent::__construct(
            email: $email,
            password: $password
        );
    }
}
