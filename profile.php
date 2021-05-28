
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
                <table class="table">
                        <tr>
                            <td>Name</td>
                            <td><?php echo $user['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $user['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $user['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $user['address']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "footer.php"; ?>