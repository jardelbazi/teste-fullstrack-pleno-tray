<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Throwable;

class AuthException extends Exception
{
    public function __construct(
        string $message = "Erro de autenticação",
        int $code = Response::HTTP_UNAUTHORIZED,
        ?Throwable $previous = null
    ) {
        parent::__construct(
            message: $message,
            code: $code,
            previous: $previous
        );
    }
}
