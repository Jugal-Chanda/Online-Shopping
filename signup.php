<?php include_once "header.php"; ?>

        <section >
            <div class="row justify-content-center">
                <div class="col-md-6 align-self-center">
                    <div class="card">
                        <div class="card-header">
                            <h3>SignUp</h3>
                        </div>
                        <div class="card-body">
                            <form action="signup_action.php" method="POST" enctype="multipart/form-data" id="add-product-form">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Your Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" required placeholder="Enter Your Email Address">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" required placeholder="Enter Your Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="10"  class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required placeholder="Enter Your Password">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-sm btn-success px-3">Sign UP</button> 
                                    Have a account already? <a href="signin.php">Signin</a>
                                </div>
        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once "footer.php"; ?>