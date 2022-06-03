<?php

namespace GloatingCord26\App\Controlling;

use GloatingCord26\Framework\Classes\Logger;

class MainController
{
    public function index()
    {
        return '<h1>index</h1>';
    }

    public function hello(): void
    {
        echo 'hello!!!';

        $log = new Logger();

        $log->info('hello');
    }

    public function notFound()
    {
        return '<h1>Cannot find what you are looking for</h1>';
    }
}
