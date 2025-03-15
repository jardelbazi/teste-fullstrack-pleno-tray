<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class UserException extends Exception
{
    public function __construct(
        string $message = "Erro ao processar usuário",
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct(
            message: $message,
            code: $code,
            previous: $previous
        );
    }
}
