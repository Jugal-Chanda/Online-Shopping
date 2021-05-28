<?php
include_once "auth.php";
logout();
if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Successfully Logout");
    addToSession('success',$success);
}
header('location: index.php');