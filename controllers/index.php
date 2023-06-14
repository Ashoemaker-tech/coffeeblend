<?php

// use Core\Database;
// use Core\Template;

// $db = new Database;
// $db->connect();
// $products = $db->query("SELECT * FROM products")->get();

// Template::view("index.html",[
//     'products' => $products
// ]);
global $container;

$db = $container->get('db');

    $products = $db->select('products',[
        'id', 'name', 'image', 'price', 'description', 'type'
    ]);
    view('index', [
        'products' => $products
    ]);