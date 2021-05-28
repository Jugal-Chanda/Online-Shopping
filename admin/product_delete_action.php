<?php
include_once "admin_required.php";
include_once "../datatabase/query.php";
include_once "../session.php";

$result = deleteData('products',['id'=>$_GET['id']]);
if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Product Deleted Successfully!!");
    addToSession('success',$success);
}


header('Location: products.php');

