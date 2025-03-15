<?php

namespace App\Services\Auth;

use App\Adapters\Auth\AuthAdapterInterface;
use App\DTOs\Auth\AuthUpdateDTO;
use App\Exceptions\AuthException;
use App\Http\Requests\LoginRequest;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        protected AuthAdapterInterface $authAdapter
    ) {}

    public function login(LoginRequest $request): ?AuthUpdateDTO
    {
        try {
            $credentials = $this->authAdapter->fromRequest($request);

            if ($token = JWTAuth::attempt($credentials->toArray())) {
                $user = JWTAuth::user();

                return $this->authAdapter->fromModel($user, $token);
            }

            throw new AuthException("Credenciais inválidas");
        } catch (Exception $e) {
            throw new AuthException($e->getMessage(), $e->getCode());
        }
    }
}
