<?php

require_once 'start_script.php';

use Controller\MainController;
use Main\Routes;

$route = new Routes();
$main_controller = new MainController();

$route->get('/', [$main_controller, 'index']);
$route->get('/hello', [$main_controller, 'hello']);
$route->get('/hei', [$main_controller, 'hei']);
$route->post('/hei', [$main_controller, 'hei']);

$route->resolve();
