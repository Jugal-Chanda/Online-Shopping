<?php
include_once "admin_required.php";
include_once "../datatabase/query.php";

?>

<?php include "../header.php"; ?>

        <section>
            <div class="row">
                <div class="col-md-3">
                    <?php include "sidebar.php"; ?>
                </div>

                <div class="col-md-9">
                    <?php

                    $product = getById('products', $_GET['id']);

                    ?>
                    <div class="card">
                        <div class="card-header">
                            Edit Product
                        </div>
                        <div class="card-body">
                            <form action="product_edit_action.php?id=<?php  echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data" id="add-product-form">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Product Name" value="<?php  echo $product['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="price">Product Price</label>
                                    <input type="number" class="form-control" name="price" id="price" required placeholder="Enter Product Price" min="0" value="<?php  echo $product['price']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="brand">Product Brand(optional)</label>
                                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Enter Product Brand Name" value="<?php  echo $product['brand']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control" name="image" id="image" placeholder="Upload Product Image">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-sm btn-success px-3">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php include "../footer.php"; ?>