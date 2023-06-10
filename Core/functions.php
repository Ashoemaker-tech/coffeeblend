<?php

use Core\Response;

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

function view($path, $attributes = [], $layout = 'default.php')
{
    $view_content = renderViewOnly($path, $attributes);

    ob_start();
    require base_path("views/layouts/{$layout}");
    $rendered_layout = ob_get_Clean();

     echo str_replace('{{ content }}', $view_content, $rendered_layout);
}

 function renderViewOnly($view, $attributes = [])
{
    extract($attributes);
    
    ob_start();
    require base_path("views/{$view}");
    return ob_get_clean();
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

