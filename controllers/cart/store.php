<?php

if(isset($_SESSION['user_id'])) {

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

    $cart_item = $db->get('cart',
    [
        'id', 'quantity', 'product_id', 'user_id'
    ],
    [
        'product_id' => $product_id,
		'user_id'    => $user_id
    ]);

    if($cart_item){
       $db->update('cart',[
        'quantity[+]' => $quantity
       ],
       [
        'product_id' => $product_id
       ]); 
       redirect('/');

    }

	$db->insert('cart',
	[
	'name'         => $name,
	'description'  => $description,
	'product_id'   => $product_id,
	'price'        => $price,
	'image'        => $image,
	'quantity'     => $quantity,
	'attributes'   => $attributes,
	'user_id'      => $user_id
	]);
		
    // TODO set session for success and error messages
    redirect('/cart');
}else {
	// TODO send login to add items message via session
    redirect('/login');
}


