<?php

use Core\Database;
use Core\Validator;


if (isset($_SESSION['username'])) {
	header('location: /');
	die();
}

$db = new Database();
$db->connect();
$errors = [];

if (!Validator::string($_POST['username'], 1, 20) || !Validator::email($_POST['email']) || empty($_POST['password'])) {
	$errors['body'] = 'All form fields are required';
}

if (!empty($errors)) {
	view("auth/register.view.php", [
		'errors' => $errors
	]);
}
$db->query('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)', [
	'username' => $_POST['username'],
	'email' => $_POST['email'],
	'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
]);

header('location: /login');
die();
