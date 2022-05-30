<?php

namespace Framework\Routing;

use Throwable;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    protected array $errorHander = [];

    public function get(string $url, mixed $func): void
    {
        $this->getRoutes[$url] = $func;
    }

    public function post(string $url, mixed $func): void
    {
        $this->postRoutes[$url] = $func;
    }

    public function resolve()
    {
        $pathInfo = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ('GET' === $method) {
            try {
                $func = $this->getRoutes[$pathInfo] ?? null;
            } catch (Throwable $e) {
                return $this->resolveError();
            }
        }

        if ('POST' === $method) {
            try {
                $func = $this->postRoutes[$pathInfo] ?? null;
            } catch (Throwable $e) {
                return $this->resolveError();
            }
        }

        if (!isset($func)) {
            $this->redirect('/');
        }

        if (isset($func)) {
            call_user_func($func, $this);
        }
    }

    public function errorHander(int $code, callable $handler): void
    {
        $this->errorHanders[$code] = $handler;
    }

    public function resolveNotAllowed(): mixed
    {
        $this->errorHanders[400] ??= fn () => 'not allowed';

        return $this->errorHandlers[400]();
    }

    public function resloveNotFound(): mixed
    {
        $this->errorHanders[404] ??= fn () => 'not found';

        return $this->errorHandlers[404]();
    }

    public function resolveError(): mixed
    {
        $this->errorHanders[500] ??= fn () => 'server error';

        return $this->errorHandlers[500]();
    }

    public function redirect(string $path, int $statusCode = 303): void
    {
        header('Location: '.$path, true, $statusCode);
    }
}
