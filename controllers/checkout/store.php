<?php

if (!isset($_POST['checkout_totals'])) {
  redirect('/cart');
  // TODO add session message
}

$_SESSION['checkout_total'] = $_POST['checkout_totals'];

if (!isset($_SESSION['checkout_total'])) {
  redirect('/cart');
}

redirect('/checkout');
