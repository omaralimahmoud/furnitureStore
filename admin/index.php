<?php


include("layouts/header.php"); ?>

<?php

use furnitureStore\Classes\Models\Category;
use furnitureStore\Classes\Models\Order;
use furnitureStore\Classes\Models\Product;

$product = new Product;
$productCount = $product->getCount();
$category = new Category;
$categoryCount = $category->getCount();
$order = new Order;
$orderCount = $order->getCount();

?>


<div class="container py-5">
    <div class="row">

        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between align-items-center">
                        <h5><?= $productCount; ?></h5>
                        <a href="<?= AdminURL; ?>products.php" class="btn btn-light">Show</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between align-items-center">
                        <h5><?= $categoryCount; ?></h5>
                        <a href="<?= AdminURL; ?>categories.php" class="btn btn-light">Show</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between align-items-center">
                        <h5><?= $orderCount; ?></h5>
                        <a href="<?= AdminURL; ?>orders.php" class="btn btn-light">Show</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>