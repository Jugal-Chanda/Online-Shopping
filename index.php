<?php
include_once "datatabase/query.php";
?>

<?php include_once "header.php"; ?>
        <section>
            <div class="product-section">
                <div class="row">
                    <?php
                    $products = selectAll('products');

                    ?>
                    <?php
                    foreach ($products as $key => $product) {
                    ?>
                    <div class="col-md-4 col-lg-3">
                        <div class="product-single border">
                            <div class="product-img">
                                <img src="uploads/<?php echo $product['image']; ?>" alt="Monitor" style="width: 100%;">
                            </div>
                            <div class="product-name mx-1">
                                <h4 class="text-capitalize"><?php echo $product['name'];  ?></h4>
                                <h4 class="text-capitalize">Brand : <?php echo $product['brand'];  ?></h4>
                            </div>
                            <div class="product-price mx-1">
                                <h3 class="text-info">BDT <?php  echo $product['price']; ?> Tk</h3>
                            </div>
                            <div class="product-add-to-cart-btn">
                                <a class="btn btn-sm btn-info w-100" href="add_to_cart_action.php?id=<?php echo $product['id']; ?>">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                    
                   
                </div>
            </div>
        </section>

        <?php include_once "footer.php"; ?>
