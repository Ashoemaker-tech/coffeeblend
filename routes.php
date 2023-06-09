<?php

$router->get('/', 'controllers/index.php');

// Allow user to login
$router->get('/login', 'controllers/auth/login.php');
$router->post('/login', 'controllers/auth/store.php');

$router->get('/logout', 'controllers/auth/destroy.php');

// Register a user
$router->get('/register', 'controllers/auth/register.php');
$router->post('/register', 'controllers/auth/create.php');

// reservations
$router->post('/reservation', 'controllers/reservations/create.php');

// products
$router->get('/product', 'controllers/product/index.php');

// Cart
$router->get('/cart', 'controllers/cart/index.php');