<?php
include_once "admin_required.php";
include_once "../datatabase/query.php";
$orders = selectAllWithOneToManyReverse('users','orders','user_id');


?>

<?php include "../header.php"; ?>

        <section>
            <div class="row">
                <div class="col-md-3">
                    <?php include "sidebar.php"; ?>
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
                                        <th>Placed AT</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($orders as $order) {
                                    ?>

                                    <tr>
                                        <td>1</td>
                                        <td>
                                        <?php echo $order['order_no']; ?>
                                        <a href="order_single.php?order_no=<?php echo $order['order_no']; ?>">View</a>
                                        </td>
                                        <td><?php echo $order['created_at']; ?></td>
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
                                        <td>BDT <?php echo $order['total']; ?></td>
                                        <td><a href="delivered.php?order_no=<?php echo $order['order_no']; ?>" class="btn btn-sm btn-success">Delivered</a></td>
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
    <?php include "../footer.php"; ?>