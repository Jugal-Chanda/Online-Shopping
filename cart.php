<?php
include_once "session.php";
include_once "datatabase/query.php";
?>
<?php include_once "header.php"; ?>

<section>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Product Code</th>
                <th style="width: 50px;">Product Image</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cart = getSessionData("cart");
            ?>

            <?php
            $total = 0;
            foreach ($cart as $key => $product) {
                $p = getById('products',$key);

            ?>
                <tr>
                    <td>1</td>
                    <td><?php echo $product['code']; ?></td>
                    <td class="" style="width: 50px;">
                        <img src="uploads/<?php echo $p['image']; ?>" alt="" style="width: 50px;">
                    </td>
                    <td>
                        <?php echo $product['name'];; ?>
                    </td>
                    <td>
                    <?php echo $p['brand']; ?>
                    </td>
                    <td>
                        <div id="qty" class="qty"><?php echo $product['qty']; ?></div>
                    </td>
                    <td>
                        BDT <?php echo $product['price']; ?>
                    </td>
                    <td>
                        BDT <?php 
                        echo $product['qty'] * $product['price']; 
                        $total += $product['qty'] * $product['price'];
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="delete_from_cart_action.php?id=<?php echo $key; ?> ">Delete</a>
                    </td>
                </tr>
            <?php
            }

            ?>

            <tr>
                <td colspan="7" class="text-right">Total</td>
                <td>BDT <?php echo $total; ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</section>
<section>
    <div class="btn-container">
        <div class="row">
            <div class="col-md-6 text-left">
                <a class="btn btn-sm btn-info px-4" href="index.php">
                    <-Continue Shoping</a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-sm btn-info px-4" href="checkout.php">Checkout-></a>
            </div>
        </div>
    </div>
</section>
<?php include_once "footer.php"; ?>