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
        $token = $request->getHeaderLine('Authorizaton');

        if (0 === strpos($token, 'Bearer')) {
            return $handler->handle($request);
        }

        $token = trim(substr($token, 7));

        if (isset($this->keys[$token])) {
            $request = $request->withAttribute('user', $this->keys[$token]);
        }

        return $handler->handle($request);
    }
}
