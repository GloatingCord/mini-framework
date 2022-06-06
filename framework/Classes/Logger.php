<?php

namespace GloatingCord26\Framework\Classes;

use Psr\Log\LoggerInterface;

class Logger implements LoggerInterface
{
    public function emergency(string|\Stringable $message, array $context = []): void
    {
    }

    public function alert(string|\Stringable $message, array $context = []): void
    {
    }

    public function critical(string|\Stringable $message, array $context = []): void
    {
    }

    public function error(string|\Stringable $message, array $context = []): void
    {
        file_put_contents(__DIR__.'/../Log/Error/Log-info'.date('c').'.json', json_encode($context, JSON_PRETTY_PRINT));
    }

    public function warning(string|\Stringable $message, array $context = []): void
    {
    }

    public function notice(string|\Stringable $message, array $context = []): void
    {
    }

    public function info(string|\Stringable $message, array $context = []): void
    {
        file_put_contents(__DIR__.'/../Log/Info/Log-info'.date('c').'.json', json_encode($context, JSON_PRETTY_PRINT));
    }

    public function debug(string|\Stringable $message, array $context = []): void
    {
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
    }
}
