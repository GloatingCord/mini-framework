<?php

namespace GloatingCord26\App\Controlling;

use GloatingCord26\Framework\Classes\Logger;

class MainController
{
    public function index()
    {
        echo 'index';
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
