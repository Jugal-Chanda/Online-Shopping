<?php

include_once "datatabase/query.php";
include_once "session.php";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$result = insertData('users',[
    "name" => $name,
    "email" => $email,
    "phone" => $phone,
    "address" => $address,
    "password" => hash('sha256',$password),
    "token" => hash('sha256',time()),
]);
if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Yout account is registeres");
    addToSession('success',$success);
}
header('Location: signin.php');
