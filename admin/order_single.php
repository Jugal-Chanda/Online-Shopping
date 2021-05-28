<?php
include_once "admin_required.php";
include_once "../datatabase/query.php";
$orderNo = $_GET['order_no'];
$order = getFirst(selectWhereE('orders', ['order_no' => $orderNo]));
$products = getOneManyToManyData('order_product', 'orders', 'order_id', 'products', 'product_id', $order['id'])['products'];
$customer = getById('users', $order['user_id']);


?>

<?php include "../header.php" ?>

<section>
    <div class="row">
        <div class="col-md-3">
            <?php include "sidebar.php"; ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Order
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Order No: </td>
                            <td><?php echo $order['order_no']; ?></td>
                        </tr>
                        <tr>
                            <td>Customer Name: </td>
                            <td><?php echo $customer['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Customer Email:</td>
                            <td><?php echo $customer['email']; ?> </td>
                        </tr>
                        <tr>
                            <td>Customer Phone:</td>
                            <td><?php echo $customer['phone']; ?> </td>
                        </tr>
                        <tr>
                            <td>Customer Address:</td>
                            <td><?php echo $customer['address']; ?> </td>
                        </tr>
                        <tr>
                            <td>Order Status</td>
                            <td>
                                <?php
                                if ($order['status']) {
                                    echo "<span class='text-success'>Delivered</span>";
                                } else {
                                    echo "<span class='text-danger'>Pending</span>";
                                }
                                ?> </td>
                        </tr>
                    </table>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Prodcut Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($products as $key => $product) {
                            ?>

                                <tr>
                                    <td>1</td>
                                    <td><?php echo $product['code']; ?></td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['price']; ?> </td>
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