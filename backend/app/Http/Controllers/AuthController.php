<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthException;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\Auth\AuthServiceInterface;
use App\Services\Logging\ErrorLoggerService;
use Exception;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        protected AuthServiceInterface $authService
    ) {}

    public function login(LoginRequest $request)
    {
        try {
            $Authenticated = $this->authService->login($request);

            if ($Authenticated) {
                $data = new AuthResource($Authenticated);

                return response()->json([
                    'message' => 'Login realizado com sucesso!',
                    'data' => $data,
                ]);
            }

            return response()->json(['error' => 'Credenciais inválidas'], Response::HTTP_UNAUTHORIZED);
        } catch (AuthException $e) {
            ErrorLoggerService::logError('Erro na autenticação', $e);
            return response()->json(['error' => $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        } catch (Exception $e) {
            ErrorLoggerService::logError('Erro interno do servidor', $e);
            return response()->json(['error' => 'Erro interno do servidor'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout()
    {
        try {
            $this->authService->logout();

            return response()->json(['message' => 'Logout realizado com sucesso!']);
        } catch (Exception $e) {
            ErrorLoggerService::logError('Erro ao realizar o logout', $e);
            return response()->json(['error' => 'Erro ao realizar o logout'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
