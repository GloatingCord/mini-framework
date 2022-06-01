<?php

use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\Diactoros\Stream;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

require_once __DIR__.'/../vendor/autoload.php';
    
$request = ServerRequestFactory::fromGlobals();

$response = new Response();
$response = $response->withStatus(201)->withAddedHeader('Special-header', 'value')->withBody($request->getBody());

$stream = $request->getBody()->detach();
stream_filter_append($stream, 'string.rot13');
$response = $response->withBody(new stream($stream));

$emitter = new SapiEmitter();

$emitter->emit($response);

echo 'hello';
