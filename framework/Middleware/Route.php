<?php

namespace GloatingCord26\Framework\Middleware;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Route implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $headers = ['X-Foo' => 'Bar'];
        $body = 'hello!';
        $request = new Request('GET', '/', ['X-Foo' => 'bar']);

        // The constructor requires no arguments.
        $response = new Response();
        echo $response->getStatusCode(); // 200
        echo $response->getProtocolVersion(); // 1.1

        // You can supply any number of optional arguments.
        $status = 200;
        $headers = ['X-Foo' => 'Bar'];
        $body = 'hello!';
        $protocol = '1.1';

        return new Response($status, $headers, $body, $protocol);
    }
}
