<?php

use Core\Validator;

global $container;
$db = $container->get('db');

if (
	!Validator::string($_POST['first_name'], 1, 50) || !Validator::string($_POST['last_name'], 1, 50)
	|| empty($_POST['date']) || empty($_POST['time']) || empty($_POST['phone_number'])
) {
	set_message('All form fields are required', 'error');
	redirect('/');
}

if ($_POST['date'] > date("Y-m-d")) {

	$db->insert('reservations', [
		'first_name'   => $_POST['first_name'],
		'last_name'     => $_POST['last_name'],
		'date'          => $_POST['date'],
		'time'          => $_POST['time'],
		'phone_number'  => $_POST['phone_number'],
		'message'       => $_POST['message'],
		'user_id'       => $_SESSION['user_id']
	]);
	set_message('Your reservation was scheduled successfully', 'success');
	back();
} else {
	set_message('Please choose a valid date and time', 'error');
	back();
}
