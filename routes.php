<?php

use Medoo\Medoo;
use Dotenv\Dotenv;
use Core\Validator;

require_once BASE_PATH . 'Core/router.php';

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_TYPE']);
// Connect to the database.
$db = new Medoo([
    'type' => $_ENV['DB_TYPE'],
    'host' => $_ENV['DB_HOST'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS']
]);

// // products
// $router->get('/product', 'controllers/product/index.php');

// // Cart
// $router->get('/cart', 'controllers/cart/index.php');
// $router->post('/cart', 'controllers/cart/store.php');

get('/', function() use ($db) {
    $products = $db->select('products',[
        'id', 'name', 'image', 'price', 'description', 'type'
    ]);
    view('index', [
        'products' => $products
    ]);
});

get('/register', function() {
    if(isset($_SESSION['username'])) {
        redirect('/');
    }
    view('auth/register');
});

// Register User
post('/register', function() use($db) {
    $errors = [];

    if (!Validator::string($_POST['username'], 1, 20) || !Validator::email($_POST['email']) || empty($_POST['password'])) {
        $errors['body'] = 'All form fields are required';
    }

    if (!empty($errors)) {
        view("auth/register", [
            'errors' => $errors
        ]);
    }
    
    $db->insert('users',[
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    redirect('/login');
});

//Login routes
get('/login', function(){
    if(isset($_SESSION['username'])) {
        redirect('/');
    }
    view('auth/login');
});

post('/login', function() use($db) {
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
});

// Logout
get('/logout', function() {
    session_unset();
    session_destroy();
    header('location: /');
	die();
});

// Reservations
post('/reservation', function() use($db) {

$errors = [];
if (!Validator::string($_POST['first_name'], 1, 50) || !Validator::string($_POST['last_name'], 1, 50) 
 || empty($_POST['date']) ||empty($_POST['time']) || empty($_POST['phone_number'])) {
	$errors['body'] = 'All form fields are required';

    return view('index', [
        'errors' => $errors
    ]);
    die();
}

if($_POST['date'] > date("Y-m-d")) {

    $db->insert('reservations',[
        'first_name'   => $_POST['first_name'],
       'last_name'    => $_POST['last_name'],
       'date'         => $_POST['date'],
       'time'         => $_POST['time'],
       'phone_number' => $_POST['phone_number'],
       'message'      => $_POST['message'],
       'user_id'      => $_SESSION['user_id']
    ]);
    $notification =  '<div class="alert alert-success text-center">We recieved your reservation</div>';
    return view('index',[
        'notification' => $notification
    ]);
}else {
    $notification =  '<div class="alert alert-danger text-center">Please choose a valid date</div>';
    return view('index',[
        'notification' => $notification
    ]);
}
});

// single product
get('/product/$id', function($id) use($db) {

    $product = $db->get('products',[
        'id', 'name', 'image', 'price', 'description', 'type'
    ],
    [
        'id' => $id
    ]);

    $relatedProducts = $db->select('products',[
        'id', 'name', 'image', 'price', 'description', 'type'
    ],[
        'type' => $product['type'],
        'id[!]' => $product['id']
    ]);

    view('product/single',[
        'product' => $product,
        'relatedProducts' => $relatedProducts
    ]);
});

any('/404', base_path('views/notFound'));