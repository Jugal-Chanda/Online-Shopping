<?php

include_once "../auth.php";

if(!isAuthenticated())
{
    header('Location: signin.php');
}

$user = getAuthenticateUser();
if(!$user['is_admin'])
{
    header('Location: ../index.php');
}