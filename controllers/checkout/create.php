<?php

use Core\Validator;

if (!isset($_SESSION['user_id']) || !isset($_SESSION['checkout_total'])) {
	redirect('/');
}


global $container;

$db = $container->get('db');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$state = $_POST['state'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip_code = $_POST['zip_code'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$status = 'processing';
$user_id = $_SESSION['user_id'];
$total_price = $_SESSION['checkout_total'];

// FIX: proper validation check this is horrendous!
if (
	!Validator::string($first_name, 1, 20) || !Validator::email($email)
	|| !Validator::string($last_name, 1, 20) || !Validator::string($state, 1, 20) || !Validator::string($address, 1, 20)
	|| !Validator::string($city, 1, 20) || !Validator::string($zip_code, 1, 20) || !Validator::string($phone, 1, 20)
) {
	set_message('All form fields are required', 'error');
	redirect('/checkout');
}

$db->insert(
	'orders',
	[
		'first_name'  => $first_name,
		'last_name'   => $last_name,
		'state'       => $state,
		'address'     => $address,
		'city'        => $city,
		'zip_code'    => $zip_code,
		'phone'       => $phone,
		'email'       => $email,
		'user_id'     => $user_id,
		'status'      => $status,
		'total_price' => $total_price,
	]
);

$db->delete("cart", [
	"AND" => [
		"user_id" => $user_id,
	]
]);

// TODO: create thankyou page
set_message('Your order has been placed', 'success');
redirect('/');
