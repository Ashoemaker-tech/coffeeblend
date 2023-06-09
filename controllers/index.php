<?php

use Core\Database;

$db = new Database;
$db->connect();
$products = $db->query("SELECT * FROM products")->get();

view("index.view.php",[
    'products' => $products
]);
