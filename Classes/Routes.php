<?php

namespace Main;

class Routes
{
    public array $get_routes = [];
    public array $post_routes = [];

    public function get($url, $fn)
    {
        $this->get_routes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->post_routes[$url] = $fn;
    }

    public function resolve()
    {
        $path_info = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ('GET' === $method) {
            $fn = $this->get_routes[$path_info] ?? null;
        }

        if ('POST' === $method) {
            $fn = $this->post_routes[$path_info] ?? null;
        }

        if (!$fn) {
            echo '404';

            exit;
        }

        call_user_func($fn, $this);
    }
}
