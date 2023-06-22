<?php


require_once BASE_PATH . 'Core/router.php';

get('/', '../controllers/index.php');

get('/about', function () {
	$title = 'About Us';
	$page = 'About';
	view('about', [
		'page' =>  $page,
		'title' => $title
	]);
});

get('/contact', function () {
	$title = 'Contact Us';
	$page = 'Contact';
	view('contact', [
		'page' => $page,
		'title' => $title
	]);
});

get('/services', function () {
	$title = 'Our Services';
	$page = 'Services';
	view('services', [
		'page' => $page,
		'title' => $title
	]);
});

get('/menu', function () {
	$title = 'Our Menu';
	$page = 'menu';
	view('menu', [
		'page' => $page,
		'title' => $title
	]);
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

// User
get('/user/reservations', '../controllers/users/reservations.php');
get('/user/orders', '../controllers/users/orders.php');

// 404 Page
any('/404', '../controllers/notFound.php');
