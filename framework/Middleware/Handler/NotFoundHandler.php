<?php

namespace GloatingCord26\Framework\Middleware\Handler;

use GloatingCord26\App\Controlling\MainController;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class NotFoundHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $mainController = new MainController();

        return new HtmlResponse($mainController->notFound(), 404, ['Error' => 'Something worng has happoned lol']);
    }
}
