<?php

include_once "auth.php";
include_once "datatabase/query.php";
include_once "cart_helper.php";
?>
<?php

$orderNo = $_GET['order_no'];
// print_r($order_no);
// getFirst(selectWhereE('orders', ['order_no' => $orderNo]));
// print_r(getFirst(selectWhereE('orders', ['order_no' => $orderNo])));
$order = getFirst(selectWhereE('orders', ['order_no' => $orderNo]));
$products = getOneManyToManyData('order_product', 'orders', 'order_id', 'products', 'product_id', $order['id'])['products'];

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
                    Order No: <?php echo $order['order_no']; ?>
                </div>
                <div class="card-body">

                    <table class="table">
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
                            foreach ($products as $product) {
                            ?>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $product['code']; ?></td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['price']; ?></td>
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