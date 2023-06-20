<?php

if (!isset($_POST['checkout_totals'])) {
	redirect('/cart');
	// TODO: add disabled to checkout btn to ensure that users cannot come to checkout with no items in cart
}

$_SESSION['checkout_total'] = $_POST['checkout_totals'];

if (!isset($_SESSION['checkout_total'])) {
	redirect('/cart');
}

redirect('/checkout');
