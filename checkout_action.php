<?php

include_once "datatabase/query.php";
include_once "session.php";

$userId = $_POST['userId'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address  = $_POST['address'];

updateData('users',$userId,[
    'name' => $name,
    'phone' => $phone,
    'address' => $address
]);

$result = insertData('orders',[
    'order_no' => time(),
    'user_id' => $userId
]);

$orderId = $result['id'];

$cart = getSessionData('cart');
$total = 0;
foreach ($cart as $key => $value) {
    insertData('order_product',[
        'order_id' => $orderId,
        'product_id' => $key,
        'qty' => $value['qty']
    ]);
    $total += $value['price'] * $value['qty'];
}

updateData('orders',$orderId,[
    'total' => $total+50
]);

deleteSession('cart');
if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Your Order Is Placed!!");
    addToSession('success',$success);
}

header('location: order_single.php?order_no='.$result['order_no']);
