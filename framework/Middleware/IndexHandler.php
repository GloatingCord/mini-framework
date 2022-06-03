<?php

namespace GloatingCord26\Framework\Middleware;

use GloatingCord26\App\Controlling\MainController;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class IndexHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $mainController = new MainController();

        return new HtmlResponse($mainController->index());
    }
}
