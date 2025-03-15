<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(User $user): User
    {
        $user->save();
        return $user->fresh();
    }
}
