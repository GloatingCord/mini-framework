<?php

namespace Main;

use Main\Server;

class Routes
{

    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get(string $url, mixed $func): void
    {
        $this->getRoutes[$url] = $func;
    }

    public function post(string $url, mixed $func): void
    {
        $this->postRoutes[$url] = $func;
    }

    public function resolve(): void
    {
        $pathInfo = $_SERVER["PATH_INFO"] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ('GET' === $method) {
            $func = $this->getRoutes[$pathInfo] ?? null;
        }

        if ('POST' === $method) {
            $func = $this->postRoutes[$pathInfo] ?? null;
        }

        if (!isset($func)) {
            echo '404';
        }
        
        if (isset($func)) {
            call_user_func($func, $this);   
        }
    }
}
