<?php

include_once "datatabase/query.php";
include_once "session.php";

$productId = $_GET['id'];
$product = getById('products',$productId);

$cart = array();
if(checkSessionIsSet("cart"))
{
    $cart = getSessionData("cart");
}
if(isset($cart[$productId]))
{
    $newCart = $cart[$productId];
    $newCart["qty"] += 1;
}
else
{
    $newCart = array(
        "code" => $product['code'],
        "name" => $product['name'],
        "price" => $product['price'],
        "qty" => 1,
    );
}

$cart[$productId] = $newCart;
addToSession("cart",$cart);
if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Product Added to Cart!!");
    addToSession('success',$success);
}

header('Location: cart.php');