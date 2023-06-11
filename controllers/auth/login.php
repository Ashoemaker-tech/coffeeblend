<?php

use Core\Template;
if(isset($_SESSION['username'])) {
    header('location: /');
    die();
}


Template::view('auth/login.html');