<?php

use GloatingCord26\Framework\Classes\Logger;
use GloatingCord26\Framework\Middleware\AuthMiddleware;
use GloatingCord26\Framework\Middleware\Handler\NotFoundHandler;
use GloatingCord26\Framework\Middleware\Handler\StackHandler;
use GloatingCord26\Framework\Middleware\Handler\TrafficHandler;
use GloatingCord26\Framework\Middleware\Handler\WeatherHandler;
use GloatingCord26\Framework\Middleware\HeaderMiddleware;
use GloatingCord26\Framework\Middleware\ResourceMiddleware;
use GloatingCord26\Framework\Middleware\RouteMiddleware;
use GloatingCord26\Framework\Middleware\SessionMiddleware;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

require_once __DIR__.'/start_script.php';
$logger = new Logger();

$handler = new StackHandler(new NotFoundHandler($logger));

$handler->add(new AuthMiddleware(
    [
        'Authorization' => 'secret',
    ]
));

$handler->add(new HeaderMiddleware());

$handler->add(new SessionMiddleware());

$handler->add(new RouteMiddleware(''));

$handler->add(new ResourceMiddleware(
    [
        'traffic' => new TrafficHandler($logger),
        'weather' => new WeatherHandler($logger),
    ]
));

$emitter = new SapiEmitter();
$emitter->emit($handler->handle(ServerRequestFactory::fromGlobals()));
