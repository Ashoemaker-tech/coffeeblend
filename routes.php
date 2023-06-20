<?php


require_once BASE_PATH . 'Core/router.php';

get('/', '../controllers/index.php');

get('/about', function () {
	view('about');
});

get('/contact', function () {
	view('contact');
});

get('/services', function () {
	view('services');
});

get('/menu', function () {
	view('menu');
});

// Auth
get('/register', '../controllers/auth/register.php');
post('/register', '../controllers/auth/create.php');
get('/login', '../controllers/auth/login.php');
post('/login', '../controllers/auth/store.php');
get('/logout', '../controllers/auth/destroy.php');

// Manage reservation
post('/reservation', '../controllers/reservations/create.php');

// Product
get('/product', '../controllers/product/index.php');

// Cart
get('/cart', '../controllers/cart/index.php');
post('/cart', '../controllers/cart/store.php');
post('/remove-item', '../controllers/cart/destroy.php');

// checkout
get('/checkout', '../controllers/checkout/index.php');
post('/checkout', '../controllers/checkout/create.php');
post('/billingdetails', '../controllers/checkout/show.php');

// 404 Page
any('/404', '../controllers/notFound.php');
