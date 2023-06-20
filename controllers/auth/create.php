<?php

use Core\Validator;


if (isset($_SESSION['username'])) {
	redirect('/');
}

global $container;
$db = $container->get('db');

if (!Validator::string($_POST['username'], 1, 20) || !Validator::email($_POST['email']) || empty($_POST['password'])) {
	set_message('All form fields are required', 'error');
	redirect('/register');
}

$db->insert('users', [
	'username' => $_POST['username'],
	'email' => $_POST['email'],
	'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
]);

redirect('/login');
