<?php

namespace GloatingCord26\Framework\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoggingMiddleware implements MiddlewareInterface
{
    private $additional;

    public function __construct(\Closure ...$additional)
    {
        $this->additional = $additional;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $data = $request->getAttributes();

        foreach ($this->additional as $additional) {
            $data = array_merge($data, $additional($request));
        }

        error_log(json_encode($data));

        return $handler->handle($request);
    }
}
