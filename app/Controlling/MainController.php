<?php

namespace GloatingCord26\App\Controlling;

use GloatingCord26\Framework\Classes\Logger;
use Twig\Environment;

class MainController
{
    public function __construct(public Environment $twig)
    {
    }

    public function index()
    {
        var_dump($_SESSION);

        return $this->twig->render('index.html', [
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
