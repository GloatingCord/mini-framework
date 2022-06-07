<?php

namespace GloatingCord26\App\Controlling;

use GloatingCord26\Framework\Classes\Logger;
use Twig\Environment;

class MainController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../Templates');
        $twig = new Environment($loader);

        return $twig->render('index.html', [
            'name' => 'Fabien',
        ]);
    }

    public function hello(): void
    {
        $log = new Logger();

        $log->info('hello');
    }

    public function notFound()
    {
        return '<h1>Cannot find what you are looking for</h1>';
    }
}
