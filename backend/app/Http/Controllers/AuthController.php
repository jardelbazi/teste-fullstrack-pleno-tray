<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Logout realizado com sucesso!']);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
