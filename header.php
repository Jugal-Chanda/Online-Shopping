<?php

include_once "auth.php";
include_once "cart_helper.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9ec2b217e3.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Online-Shopping</title>
    <?php $folder = "/2017-1-60-134(online-shopping)/"; ?>
</head>

<body>
    <div class="container">
        <header class="mb-3">
            <div class="header1">
                <?php
                $username = isAuthenticated() ? getAuthenticateUser()['name'] : "visitor";
                ?>
                Welcome <?php echo $username ?>
                <?php
                if (isAuthenticated()) {
                ?>
                    <a href="<?php echo $folder; ?>logout_action.php">Logout</a>
                <?php
                } else {
                ?>
                    <a href="<?php echo $folder; ?>signin.php">Login</a> / <a href="<?php echo $folder; ?>signup.php">Register</a>
                <?php
                }
                ?>
            </div>
            <div class="header2">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        Online-Shopping</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo $folder; ?>index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $folder; ?>profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $folder; ?>orders.php">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $folder; ?>cart.php">MyCart(<?php echo cartCount(); ?>)</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>


        <?php include_once "status.php"; ?>