<?php

include_once "auth.php";
include_once "session.php";

$email = $_POST['email'];
$password = $_POST['password'];

$result = json_decode(login([
    "email" => $email,
    "password" => hash("sha256", $password)
]));

if ($result->status == 1) {
    $user = getAuthenticateUser();
    if (checkSessionIsSet('success')) {
        $success = getSessionData('success');
        array_push($success, $result->message);
        addToSession('success',$success);
    }
    if ($user['is_admin']) {
        header('location: admin/index.php');
    }
    else
    {
        header('location: index.php');
    }
    
} else {
    if (checkSessionIsSet('error')) {
        $error = getSessionData('error');
        array_push($error, $result->message);
        addToSession('error',$error);
    }
    header('location: signin.php');
}
