<?php

global $container;

$db = $container->get('db');

if (!$_POST['product_id']) {
	redirect('/');
}

$product = $_POST['product_id'];
$name = $_POST['name'];
$user = $_SESSION['user_id'];


$db->delete('cart', [
	"AND" => [
		'product_id' => $product,
		'user_id'    => $user
	]
]);

set_message("{$name} removed from cart", 'success');
redirect('/cart');
