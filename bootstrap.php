<?php

use Medoo\Medoo;
use Dotenv\Dotenv;
use Core\Container;
use RyanChandler\Blade\Blade;

$container = new Container();

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_TYPE']);

// Connect to the database.
$db = new Medoo([
    'type' => $_ENV['DB_TYPE'],
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS']
]);

$views = BASE_PATH . 'views'; // Path to blade templates
$cache = BASE_PATH . 'storage/cache'; // Path to cache directory
$blade = new Blade($views, $cache);

$container->set('db', $db);
$container->set('blade', $blade);