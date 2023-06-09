<?php
if(isset($_SESSION['username'])) {
    header('location: /');
    die();
}


view('auth/login.view.php');