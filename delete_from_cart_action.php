<?php

include_once "session.php";

$productId = $_GET['id'];

$cart = getSessionData("cart");
unset($cart[$productId]);
addToSession("cart",$cart);
if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Product Deleted from Cart!!");
    addToSession('success',$success);
}
header('Location: cart.php');