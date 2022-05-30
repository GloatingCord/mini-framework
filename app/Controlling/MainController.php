<?php

namespace App\Controlling;

use Framework\Classes\Logger;

class MainController
{
    public function index()
    {
    }

    public function hello(): void
    {
        echo 'hello!!!';

        $log = new Logger();

        $log->info('hello');
    }

    public function hei(): void
    {
        echo 'hei!!!!';
    }
}
