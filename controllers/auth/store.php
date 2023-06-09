<?php
use Core\Validator;
use Core\Database;

$db = new Database();
$db->connect();
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

$login = $db->query("SELECT * FROM users WHERE email = :email",[
    'email' => $email
])->findOrFail();

if($login) {
    if(password_verify($password, $login['password'])) {
        // start session
        $_SESSION['username'] = $login['username'];
        $_SESSION['email'] = $login['email'];
        $_SESSION['user_id'] = $login['id'];
        header('location: /');
        exit();
    }else {
      $errors['body'] = 'Invalid Login credentials'; 
      return view('auth/login.view.php', [
        'errors' => $errors
        ]);
    }
}else {
    $errors['body'] = 'Invalid Login credentials'; 
      return view('auth/login.view.php', [
        'errors' => $errors
        ]);
}
