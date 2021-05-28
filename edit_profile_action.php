<?php include_once "login_required.php"; ?>
<?php include_once "datatabase/query.php"; ?>
<?php include_once "auth.php";  ?>

<?php

$user = getAuthenticateUser();

$fullName = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

updateData('users',$user['id'],[
    'name' => $fullName,
    'phone' => $phone,
    'address' => $address,
]);

if (checkSessionIsSet('success')) {
    $success = getSessionData('success');
    array_push($success, "Profile is updated successfully");
    addToSession('success',$success);
}
header('location: profile.php');