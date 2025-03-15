<?php

namespace App\DTOs\Auth;

use App\DTOs\BaseDTO;

class AuthDTO extends BaseDTO
{
    public function __construct(
        public string $email,
        public ?string $password = null,
    ) {}
}
