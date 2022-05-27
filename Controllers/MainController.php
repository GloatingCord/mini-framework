<?php

namespace Controller;

use Main\Logger;

class MainController
{
    public function index()
    {
        echo 'index';
    }

    public function hello()
    {
        echo 'hello!!!';

        $log = new Logger();

        $log->info('hello world');
    }

    public function hei()
    {
        echo 'hei!!!!';
    }

    public function error()
    {
        echo '404';
    }
}
