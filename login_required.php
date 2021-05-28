<?php

include_once "auth.php";

if(!isAuthenticated())
{
    header('Location: signin.php');
}