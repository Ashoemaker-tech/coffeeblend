<?php

use Tracy\Debugger;

const BASE_PATH = __DIR__.'/../';
require BASE_PATH . '/vendor/autoload.php';

session_start();

Debugger::enable();
require BASE_PATH . 'bootstrap.php';
require BASE_PATH.'Core/functions.php';
require BASE_PATH . 'routes.php';

