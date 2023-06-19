<?php

if (!isset($_SESSION['checkout_total']) || !isset($_SESSION['user_id'])) {
  redirect('/');
}



view('checkout');
