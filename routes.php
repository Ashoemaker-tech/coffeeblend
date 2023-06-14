<?php

use Core\Validator;

require_once BASE_PATH . 'Core/router.php';
// // products
// $router->get('/product', 'controllers/product/index.php');

// // Cart
// $router->get('/cart', 'controllers/cart/index.php');
// $router->post('/cart', 'controllers/cart/store.php');

get('/', '../controllers/index.php');

get('/register', '../controllers/auth/register.php');

post('/register', '../controllers/auth/create.php');

get('/login', '../controllers/auth/login.php');

post('/login', '../controllers/auth/store.php');

get('/logout', '../controllers/auth/destroy.php');

post('/reservation', '../controllers/reservations/create.php');

// single product
get('/product', '../controllers/product/index.php');

get('/cart', '../controllers/cart/index.php');

any('/404', '../controllers/notFound.php');