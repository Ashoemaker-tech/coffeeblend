<?php

global $container;

$db = $container->get('db');

if (isset($_GET['id'])) {

	$product = $db->get(
		'products',
		[
			'id', 'name', 'image', 'price', 'description', 'type'
		],
		[
			'id' => $_GET['id']
		]
	);

	$relatedProducts = $db->select('products', [
		'id', 'name', 'image', 'price', 'description', 'type'
	], [
		'type' => $product['type'],
		'id[!]' => $product['id']
	]);

	view('product/index', [
		'product' => $product,
		'relatedProducts' => $relatedProducts
	]);
} else {
	back();
}
