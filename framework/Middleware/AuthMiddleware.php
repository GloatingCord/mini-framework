<?php

namespace GloatingCord26\Framework\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(private array $keys = [])
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ('/so' === $request->getUri()->getPath()) {
            return $handler->handle($request)->withHeader('wtf', 'well this happoned');
        }

        return $handler->handle($request);
    }
}
