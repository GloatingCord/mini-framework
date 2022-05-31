<?php

use GloatingCord26\App\Controlling\MainController;
use GloatingCord26\Framework\Routing\Router;

require_once __DIR__.'/start_script.php';

$route = new Router();
$main_controller = new MainController();

$route->get('/', [$main_controller, 'index']);
$route->get('/hello', [$main_controller, 'hello']);
$route->get('/hei', [$main_controller, 'hei']);
$route->post('/hei', [$main_controller, 'hei']);

$route->resolve();
