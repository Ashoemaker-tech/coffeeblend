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

function back()
{
	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
	header("Location: $referer");
	exit;
}

// Function to render a Blade template
function view($template, $data = [])
{
	global $container;
	$blade = $container->get('blade');

	echo $blade->make($template, $data)->render();
}

function show_message()
{
	echo $_SESSION['flash_message'];
	unset($_SESSION['flash_message']);
	unset($_SESSION['flash_type']);
}

function set_message($message, $type)
{
	$_SESSION['flash_message'] = $message;
	// success, error in styles.css
	$_SESSION['flash_type'] = $type;
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
