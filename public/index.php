<?php

use GloatingCord26\App\Controlling\MainController;
use GloatingCord26\Framework\Middleware\AuthMiddleware;
use GloatingCord26\Framework\Middleware\LoggingMiddleware;
use GloatingCord26\Framework\Middleware\NotFoundHandler;
use GloatingCord26\Framework\Middleware\ResourceMiddleware;
use GloatingCord26\Framework\Middleware\RouteMiddleware;
use GloatingCord26\Framework\Middleware\StackHandler;
use GloatingCord26\Framework\Middleware\TrafficHandler;
use GloatingCord26\Framework\Middleware\WeatherHandler;
use GloatingCord26\Framework\Routing\Router;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Psr\Http\Message\RequestInterface;

require_once __DIR__.'/start_script.php';

$route = new Router();
$main_controller = new MainController();

$handler = new StackHandler(new NotFoundHandler());

$handler->add(new AuthMiddleware(
    [
        'really_secret' => 'tjlytle',
    ]
));

$handler->add(new RouteMiddleware('/'));

$handler->add(new ResourceMiddleware(
    [
        'traffic' => new TrafficHandler(),
        'weather' => new WeatherHandler(),
    ]
));

$handler->add(new LoggingMiddleware(function (RequestInterface $request) {
    return [
        'timedate' => date('c'),
        'host' => $request->getUri()->getHost(),
    ];
}));

$emitter = new SapiEmitter();
$emitter->emit($handler->handle(ServerRequestFactory::fromGlobals()));

/* $route->get('/', [$main_controller, 'index']);
$route->get('/hello', [$main_controller, 'hello']);
$route->get('/hei', [$main_controller, 'hei']);
$route->post('/hei', [$main_controller, 'hei']);

$route->resolve();
 */
