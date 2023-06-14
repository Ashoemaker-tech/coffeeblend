<?php

use Core\Validator;

global $container;
$db = $container->get('db');
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
       'last_name'     => $_POST['last_name'],
       'date'          => $_POST['date'],
       'time'          => $_POST['time'],
       'phone_number'  => $_POST['phone_number'],
       'message'       => $_POST['message'],
       'user_id'       => $_SESSION['user_id']
    ]);
    // $notification =  '<div class="alert alert-success text-center">We recieved your reservation</div>';
    // return view('index',[
    //     'notification' => $notification
    /*
    * TODO add logic for success messages 
    */
    redirect('/');
}else {
    /*
    * TODO add logic for error messages 
    */
    redirect('/');
    // $notification =  '<div class="alert alert-danger text-center">Please choose a valid date</div>';
    // return view('index',[
    //     'notification' => $notification
    // ]);
}
