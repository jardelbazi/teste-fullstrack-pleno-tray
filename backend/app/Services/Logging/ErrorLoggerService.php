<?php

namespace App\Services\Logging;

use Illuminate\Support\Facades\Log;
use Throwable;

class ErrorLoggerService
{
    public static function logError(string $context, Throwable $exception): void
    {
        Log::error($context, [
            'error' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString()
        ]);
    }
}
