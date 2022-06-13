<?php

namespace GloatingCord26\Framework\Middleware\Handler;

use GloatingCord26\App\Controlling\MainController;
use GloatingCord26\Framework\Classes\Logger;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Twig\Environment;

class IndexHandler implements RequestHandlerInterface
{
    public function __construct(public Environment $twig, public Logger $logger)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->logger->info('works', [
            'log' => 'this message',
        ]);
        $mainController = new MainController(new Environment(new \Twig\Loader\FilesystemLoader('../Templates')));

        return new HtmlResponse($mainController->index());
    }
}
