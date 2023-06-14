<?php

if(isset($_SESSION['username'])) {
    redirect('/');
}
view('auth/login');