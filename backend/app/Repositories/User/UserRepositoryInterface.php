<?php

namespace App\Repositories\User;

use App\DTOs\User\UserUpdateDTO;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(User $user): User;
}
