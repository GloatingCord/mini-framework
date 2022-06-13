<?php

namespace GloatingCord26\Framework\Middleware;

use GloatingCord26\Framework\Classes\Logger;
use GloatingCord26\Framework\Middleware\Handler\IndexHandler;
use GloatingCord26\Framework\Middleware\Handler\NotFoundHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Twig\Environment;

class RouteMiddleware implements MiddlewareInterface
{
    public function __construct(public string $basePath, public array $path = [])
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $path = $request->getUri()->getPath();
        $logger = new Logger();

        if ('/' === $path) {
            $handler = new IndexHandler(new Environment(new \Twig\Loader\FilesystemLoader('../Templates')), $logger);

            return $handler->handle($request);
        }

        if (strpos($path, $this->basePath)) {
            $handler = new NotFoundHandler($logger);

            return $handler->handle($request);
        }

        $path = substr($path, strlen($this->basePath));
        $path = trim($path, '/');
        $path = explode('/', $path);

        $routed = $request->withAttribute('route', $path[0]);

        if (isset($path[1])) {
            $routed = $routed->withAttribute('id', $path[1]);
        }

        return $handler->handle($routed);
    }
}
