<?php include_once "login_required.php"; ?>
<?php include_once "datatabase/query.php"; ?>
<?php include_once "auth.php";  ?>

<?php include_once "header.php"; ?>

<section>
    <div class="row">
        <div class="col-md-3">
            <?php include_once "profile_sidebar.php"; ?>
        </div>
        <div class="col-md-9">
            <?php $user = getAuthenticateUser(); ?>
            <div class="card">
                <div class="card-header">
                   Change Password
                </div>
                <div class="card-body">
                    <form action="change_password_action.php" method="POST" enctype="multipart/form-data" id="add-product-form">
                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="" required placeholder="Enter Your Old Password">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="" required placeholder="Enter Your New  Password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm btn-success px-3" onclick="submitForm('add-product-form')">Change Password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>