<?php

namespace GloatingCord26\Framework\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class StackHandler implements RequestHandlerInterface
{
    private $stack = [];

    public function __construct(private RequestHandlerInterface $fallback)
    {
    }

    public function add(MiddlewareInterface $middleware)
    {
        $this->stack[] = $middleware;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (0 === count($this->stack)) {
            return $this->fallback->handle($request);
        }

        $middleware = array_shift($this->stack);

        return $middleware->process($request, $this);
    }
}
