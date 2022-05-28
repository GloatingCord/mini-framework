<?php

namespace Controller;

use Main\Logger;

class MainController
{
    public function index(): string
    {
        return 'index';
    }

    public function hello(): void
    {
        echo 'hello!!!';

        $log = new Logger();

        $log->info('hello world');
    }

    public function hei(): void
    {
        echo 'hei!!!!';
    }

    public function error(): void
    {
        echo '404';
    }
}
