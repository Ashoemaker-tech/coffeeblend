<?php

use Tracy\Debugger;

const BASE_PATH = __DIR__.'/../';
session_start();
require_once BASE_PATH.'/vendor/autoload.php';

require BASE_PATH.'Core/functions.php';

Debugger::enable();

// Instantiate routes class and parse the routes so that they can be matched to the corresponding controller
$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);