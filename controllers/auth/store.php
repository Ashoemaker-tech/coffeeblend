<?php
use Core\Validator;

global $container;
$db = $container->get('db');
$errors = [];

if (! Validator::email($_POST['email']) || empty($_POST['password'])) {
    $errors['body'] = 'All form fields are required';
}

if (!empty($errors)) {
    return view('auth/login.view.php', [
    'errors' => $errors
    ]);
}

$email = $_POST['email'];
$password = $_POST['password'];

$login = $db->get('users',[
    'id', 'username', 'email', 'password'
],
[
    'email' => $email
]);

if($login) {
    if(password_verify($password, $login['password'])) {
        // start session
        $_SESSION['username'] = $login['username'];
        $_SESSION['email'] = $login['email'];
        $_SESSION['user_id'] = $login['id'];
        redirect('/');
    }else {
    $errors['body'] = 'Invalid Login credentials'; 
    return view('auth/login', [
        'errors' => $errors
    ]);
    }
}else {
    $errors['body'] = 'User not found please register'; 
    return view('auth/login', [
        'errors' => $errors
        ]);
}
