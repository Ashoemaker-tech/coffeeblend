<?php


global $container;

$db = $container->get('db');

$products = $db->select('products', [
  'id', 'name', 'image', 'price', 'description', 'type'
]);
view('index', [
  'products' => $products
]);
