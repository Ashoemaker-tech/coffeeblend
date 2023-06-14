<?php

use Core\Response;
use Core\Container;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

// Function to render a Blade template
function view($template, $data = []) {
    global $container;
    $blade = $container->get('blade');

    echo $blade->make($template, $data)->render();
}

function asset($type, $paths)
{
    $output = '';
    foreach ($paths as $path) {
        if ($type === 'stylesheet') {
            $output .= '<link rel="stylesheet" href="' . $path . '">' . PHP_EOL;
        } elseif ($type === 'script') {
            $output .= '<script src="' . $path . '"></script>' . PHP_EOL;
        }
    }
    echo $output;
}

