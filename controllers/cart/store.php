<?php

if (isset($_SESSION['user_id'])) {

	global $container;
	$db = $container->get('db');

	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	$quantity = $_POST['quantity'];
	$product_id = $_POST['product_id'];
	$attributes = $_POST['attributes'];
	$user_id = $_SESSION['user_id'];

	$cart_item = $db->get(
		'cart',
		[
			'id', 'quantity', 'product_id', 'user_id'
		],
		[
			'product_id' => $product_id,
			'user_id'    => $user_id
		]
	);

	if ($cart_item) {
		$db->update(
			'cart',
			[
				'quantity[+]' => $quantity
			],
			[
				'product_id' => $product_id
			]
		);
		redirect('/');
	}

	$db->insert(
		'cart',
		[
			'name'         => $name,
			'description'  => $description,
			'product_id'   => $product_id,
			'price'        => $price,
			'image'        => $image,
			'quantity'     => $quantity,
			'attributes'   => $attributes,
			'user_id'      => $user_id
		]
	);

	set_message("{$name} added to cart!", 'success');
	redirect('/cart');
} else {
	// TODO: add guest cart
	set_message("Please login to add items to cart", 'error');
	redirect('/login');
}
