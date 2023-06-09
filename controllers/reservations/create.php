<?php

use Core\Database;
use Core\Validator;

$errors = [];

if (!Validator::string($_POST['first_name'], 1, 50) || !Validator::string($_POST['last_name'], 1, 50) 
 || empty($_POST['date']) ||empty($_POST['time']) || empty($_POST['phone_number'])) {
	$errors['body'] = 'All form fields are required';

    return view('index.view.php', [
        'errors' => $errors
    ]);
    die();
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date = $_POST['date'];
$time = $_POST['time'];
$phone_number = $_POST['phone_number'];
$message = $_POST['message'];
$user_id = $_SESSION['user_id'];

$db = new Database();
$db->connect();

if($date > date("Y-m-d")) {
    $db->query("INSERT INTO reservations (first_name, last_name, date, time, phone_number, message, user_id) 
    VALUES(:first_name, :last_name, :date, :time, :phone_number, :message, :user_id)", [
       'first_name'   => $first_name,
       'last_name'    => $last_name,
       'date'         => $date,
       'time'         => $time,
       'phone_number' => $phone_number,
       'message'      => $message,
       'user_id'      => $user_id
    ]);
    $notification =  '<div class="alert alert-success text-center">We recieved your reservation</div>';
    return view('index.view.php',[
        'notification' => $notification
    ]);
}else {
    $notification =  '<div class="alert alert-danger text-center">Please choose a valid date</div>';
    return view('index.view.php',[
        'notification' => $notification
    ]);
}
