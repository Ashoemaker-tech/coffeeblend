<?php

use Core\Database;
use Core\Template;

$db = new Database;
$db->connect();

if(isset($_GET['id'])) {
    $product = $db->query("SELECT * FROM products WHERE id = :id",[
    'id' => $_GET['id']
    ])->findOrFail();

    $relatedProducts = $db->query("SELECT * FROM products WHERE type = :type AND id != :id",[
        'type' => $product['type'],
        'id'   => $product['id']
    ])->get();

    Template::view('product/single.html',[
        'product' => $product,
        'relatedProducts' => $relatedProducts
    ]);
}else {
    header('location: /');
}
