<?php

namespace GloatingCord26\Framework\Routing;

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
            $func = $this->getRoutes[$pathInfo] ?? null;
        }

        if ('POST' === $method) {
            $func = $this->postRoutes[$pathInfo] ?? null;
        }

        /*         if (!isset($func)) {
                    $this->redirect('/');
                } */

        if (isset($func)) {
            call_user_func($func, $this);
        }
    }

    public function redirect(string $path, int $statusCode = 303): void
    {
        header('Location: '.$path, true, $statusCode);
    }
}
