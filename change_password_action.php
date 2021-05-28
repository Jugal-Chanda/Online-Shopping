<?php include_once "login_required.php"; ?>
<?php include_once "datatabase/query.php"; ?>
<?php include_once "auth.php";  ?>

<?php

$user = getAuthenticateUser();

$old_password = hash('sha256',$_POST['old_password']);
if($old_password != $user['password'])
{
    if (checkSessionIsSet('error')) {
        $error = getSessionData('error');
        array_push($error, "Old Password Donot match with current password!!");
        addToSession('error',$error);
    }
    header('location: change_password.php');
}
else
{
    $new_password = hash('sha256',$_POST['new_password']);
    updateData('users',$user['id'],[
        'password' => $new_password,
    ]);
    if (checkSessionIsSet('success')) {
        $success = getSessionData('success');
        array_push($success, "Password Change successfully");
        addToSession('success',$success);
    }
    header('location: profile.php');
}



