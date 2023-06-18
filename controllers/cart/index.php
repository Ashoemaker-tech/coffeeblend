<?php

if (!isset($_SESSION['user_id'])) {
	redirect('/login');
}

global $container;

$db = $container->get('db');

$cart_items = $db->select('cart', [
	'id',
	'name',
	'product_id',
	'image', 
	'description', 
	'price', 
	'attributes', 
	'quantity', 
	'user_id'
	],
[
	'user_id' => $_SESSION['user_id']

]);

$cart_subtotals = 0;

if($cart_items){
	foreach ($cart_items as $item_total) {
		$cart_subtotals += $item_total['quantity'] * $item_total['price'];	
	}
}

view('cart',[
	'cart_items' => $cart_items,
	'cart_subtotals' => $cart_subtotals
]);
