<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        protected UserServiceInterface $userService
    ) {}

    public function register(UserRequest $request): JsonResponse
    {
        $data = new UserResource(
            $this->userService->create($request)
        );

        return response()->json([
            'message' => "Usuário criado com sucesso!",
            'data' => $data
        ]);
    }
}
