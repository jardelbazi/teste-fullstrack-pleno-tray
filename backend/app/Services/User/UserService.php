<?php

namespace App\Services\User;

use App\Adapters\User\UserAdapterInterface;
use App\DTOs\User\UserUpdateDTO;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\BaseService;

class UserService extends BaseService implements UserServiceInterface
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected UserAdapterInterface $userAdapter
    ) {}

    public function create(UserRequest $userRequest): UserUpdateDTO
    {
        $userDTO = $this->userAdapter->fromRequest($userRequest);
        $user = $this->userAdapter->toModel($userDTO);

        $createdUser = $this->execute(function () use ($user) {
            return $this->userRepository->create($user);
        }, 'Criando usuário');

        return $this->userAdapter->fromModel($createdUser);
    }
}
