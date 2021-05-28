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
                    Profile
                </div>
                <div class="card-body">
                    <form action="edit_profile_action.php" method="POST" enctype="multipart/form-data" id="add-product-form">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Your Full Name" value="<?php echo $user['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" required placeholder="Enter Your Email Address" readonly value="<?php echo $user['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone" required placeholder="Enter Your Phone Number" value="<?php echo $user['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control" required><?php echo $user['address']; ?></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm btn-success px-3">Update Profile</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>