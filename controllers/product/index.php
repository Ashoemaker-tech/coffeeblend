<?php

use Core\Database;

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

    // dd($relatedProducts);
    view('product/single.php',[
        'product' => $product,
        'relatedProducts' => $relatedProducts
    ]);
}else {
    header('location: /');
}
