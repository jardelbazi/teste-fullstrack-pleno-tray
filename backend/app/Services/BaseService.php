<?php

namespace App\Services;

use App\Services\Logging\ErrorLoggerService;
use App\Exceptions\UserException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Throwable;

abstract class BaseService
{
    protected function execute(callable $callback, string $context): mixed
    {
        try {
            return DB::transaction(fn() => $callback());
        } catch (QueryException $e) {
            ErrorLoggerService::logError("Erro no banco de dados: $context", $e);
            throw new UserException('Erro ao processar a solicitação. Por favor, tente novamente.', 0, $e);
        } catch (Throwable $e) {
            ErrorLoggerService::logError("Erro inesperado: $context", $e);
            throw new UserException('Ocorreu um erro inesperado. Por favor, tente novamente.', 0, $e);
        }
    }
}
