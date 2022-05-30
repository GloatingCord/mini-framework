<?php

namespace App\Controlling;

use Framework\Classes\Logger;

class MainController
{
    public function index(): void
    {
        echo 'index';
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
}
