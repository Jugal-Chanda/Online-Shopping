<?php
include_once "login_required.php";
include_once "auth.php";
include_once "datatabase/query.php";
include_once "cart_helper.php";
?>
<?php

$user = getAuthenticateUser();
$orders = getOneToManyData('users', $user['id'], 'orders', 'user_id')['orders'];

?>

<?php include_once "header.php"; ?>

<section>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <?php include_once "profile_sidebar.php"; ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Orders 
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Order No</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orders as $key => $order) {
                            ?>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $order['order_no']; ?></td>
                                    <td><?php echo $order['total']; ?></td>
                                    <td>
                                    <?php
                                            if($order['status'])
                                            {
                                                echo "<span class='text-success'>Delivered</span>";
                                            }
                                            else
                                            {
                                                echo "<span class='text-danger'>Pending</span>";
                                            }
                                        ?>
                                    </td>
                                    <td><a href="order_single.php?order_no=<?php echo $order['order_no']; ?>">View</a></td>
                                </tr>
                            <?php

                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "footer.php"; ?>