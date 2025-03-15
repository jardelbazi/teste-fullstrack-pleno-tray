<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('user', [AuthController::class, 'me']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);


Route::middleware('api')->get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
