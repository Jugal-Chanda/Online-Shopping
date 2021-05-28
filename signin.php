<?php include_once "header.php"; ?>
<section>
    <div class="row justify-content-center">
        <div class="col-md-6 align-self-center">
            <div class="card">
                <div class="card-header">
                    <h3>SignUp</h3>
                </div>
                <div class="card-body">
                    <form action="signin_action.php" method="POST" enctype="multipart/form-data" id="add-product-form">

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" required placeholder="Enter Your Email Address">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required placeholder="Enter Your Password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm btn-success px-3">Sign In</button>
                            Do not Have a account? <a href="signup.php">Signup</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php"; ?>
