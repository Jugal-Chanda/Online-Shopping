<?php

include_once "../datatabase/query.php";
include_once "../session.php";

$orderNo = $_GET['order_no'];
$order = getFirst(selectWhereE('orders', ['order_no' => $orderNo]));

updateData('orders',$order['id'],[
    'status' => 1
]);

if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "One order is deliverd");
    addToSession('success',$success);
}

header('location: orders.php');
