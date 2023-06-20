<?php

use Core\Validator;

global $container;
$db = $container->get('db');

if (!Validator::email($_POST['email']) || empty($_POST['password'])) {
	set_message('All form fields are required', 'error');
	redirect('/login');
}

$email = $_POST['email'];
$password = $_POST['password'];

$login = $db->get(
	'users',
	[
		'id', 'username', 'email', 'password'
	],
	[
		'email' => $email
	]
);

if ($login) {
	if (password_verify($password, $login['password'])) {
		// start session
		$_SESSION['username'] = $login['username'];
		$_SESSION['email'] = $login['email'];
		$_SESSION['user_id'] = $login['id'];
		redirect('/');
	} else {
		set_message('Invalid Login credentials', 'error');
		redirect('/login');
	}
} else {
	set_message('User not found please register', 'error');
	redirect('/login');
}
