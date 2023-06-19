<?php

global $container;

$db = $container->get('db');

if (!$_POST['product_id']) {
  redirect('/');
}

$product = $_POST['product_id'];
$user = $_SESSION['user_id'];


$db->delete('cart', [
  "AND" => [
    'product_id' => $product,
    'user_id'    => $user
  ]
]);

// TODO again add session messages
redirect('/cart');
