<?php
include_once "session.php";
include_once "login_required.php";
include_once "auth.php";
$user = getAuthenticateUser();
?>

<?php include_once "header.php"; ?>
        <section>
            <div class="row">
                <div class="col-md-7">
                    <form action="checkout_action.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="userId" id="" hidden value="<?php echo $user['id']; ?>">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required value="<?php echo $user['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required value="<?php echo $user['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phpne Number" required value="<?php echo $user['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="addresss" cols="30" rows="10" class="form-control" required><?php echo $user['address']; ?></textarea>
                            <small class="text-danger">** Enter Your Full Address so that delivery man can reach you.</small>
                        </div>
                    
                </div>
                <div class="col-md-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cart = getSessionData("cart");
                            $total = 0;
                            ?>
                            <?php
                            foreach ($cart as $key => $value) {
                            ?>
                            <tr>
                                <td>1</td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['qty'];  ?></td>
                                <td>BDT
                                    <?php 
                                    echo $value['qty']*$value['price'];
                                    $total += $value['qty']*$value['price'];
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="3" class="text-right text-bold"><strong>Sub Total</strong></td>
                                <td>BDT <?php echo $total; ?> </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Delivary</td>
                                <td>
                                    BDT 50
                                    <?php
                                    $total += 50;
                                    ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Total</td>
                                <td>BDT <?php echo $total; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="">
                        <button class="btn btn-sm btn-success px-4 w-100" type="submit">Procede Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once "footer.php"; ?>