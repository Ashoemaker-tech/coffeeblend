<?php

use Core\Database;
use Core\Validator;


if (isset($_SESSION['username'])) {
	redirect('/');
}

global $container;
$db = $container->get('db');
$errors = [];

if (!Validator::string($_POST['username'], 1, 20) || !Validator::email($_POST['email']) || empty($_POST['password'])) {
	$errors['body'] = 'All form fields are required';
}

if (!empty($errors)) {
	view("auth/register", [
		'errors' => $errors
	]);
}

$db->insert('users',[
	'username' => $_POST['username'],
	'email' => $_POST['email'],
	'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
]);

redirect('/login');
