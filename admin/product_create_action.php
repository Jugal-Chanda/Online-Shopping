<?php
include_once "admin_required.php";
include_once "../datatabase/query.php";
include_once "../session.php";


$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$image = "monitor.jpg";

if (!empty($_FILES['image']['name'])) {
    $target_dir = "../uploads/";
    $fileBaseName = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($fileBaseName, PATHINFO_EXTENSION));
    $targetFileName = hash('sha256', time() . $imageFileType) . "." . $imageFileType;
    $targetFile = $target_dir.$targetFileName;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $image = $targetFileName;
    } else {
        die("something error");;
    }
}

$result = insertData('products',[
    'name' => $name,
    'code' => time(),
    'price' => $price,
    'brand' => $brand,
    'image' => $image
]);

if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Product Added Successfully!!");
    addToSession('success',$success);
}

header('Location: products.php');
