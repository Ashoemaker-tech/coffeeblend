<?php

use Tracy\Debugger;
use RyanChandler\Blade\Blade;

const BASE_PATH = __DIR__.'/../';
session_start();
require_once BASE_PATH . '/vendor/autoload.php';

require BASE_PATH.'Core/functions.php';

Debugger::enable();


$views = BASE_PATH . 'views'; // Path to blade templates
$cache = BASE_PATH . 'views/cache'; // Path to cache directory

$blade = new Blade($views, $cache);

require base_path('routes.php');
