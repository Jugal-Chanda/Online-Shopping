<?php

include_once "../datatabase/query.php";

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
                    Products
                </div>
                <div class="card-body">
                    <div class="float-right mb-3">
                        <a class="btn btn-sm btn-primary" href="product_create.php">Add Product</a>
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th style="width: 50px;">Image</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = selectAll('products');
                            foreach ($products as $product) {
                            ?>

                                <tr>
                                    <td><?php echo $product['code']; ?></td>
                                    <td><?php echo $product['name']; ?></td>
                                    <td><?php echo $product['brand']; ?></td>
                                    <td style="width: 50px;">
                                        <img src="../uploads/<?php echo $product['image']; ?>" alt="" style="width: 50px;">
                                    </td>
                                    <td>BDT <?php echo $product['price']; ?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="product_edit.php?id=<?php echo $product['id']; ?>"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm" href="product_delete_action.php?id=<?php echo $product['id']; ?>"><i class="fas fa-trash"></i></a>
                                    </td>
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