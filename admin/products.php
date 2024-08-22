<?php include("layouts/header.php"); ?>
<?php

use furnitureStore\Classes\Models\Admin;
use furnitureStore\Classes\Models\Product;

$product = new Product;

$products =  $product->selectAllWithCategories("products.id AS productId, products.name AS productName, categories.name AS categoryName, price,image,pieces_number	,products.created_at AS productCreate_at  ")

?>
<div class="container-fluid py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>All Products</h3>
                <a href="<?= AdminURL; ?>add-product.php" class="btn btn-success">
                    Add new
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Image</th>
                        <th scope="col">Pieces</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($products as $index => $oneProduct): ?>
                    <tr>
                        <th>
                            <?= $index + 1 ?>
                        </th>

                        <td><?= $oneProduct['productName'] ?>
                        </td>
                        <td><?= $oneProduct['categoryName'] ?></td>
                        <td>
                            <img src="<?= URL . "uploads/" . $oneProduct['image'] ?>" height="70px" alt="">
                        </td>
                        <td><?= $oneProduct['pieces_number'] ?></td>
                        <td><?= $oneProduct['price'] ?></td>
                        <td><?= date("d-n-Y-h:i:s-a", strtotime($oneProduct['productCreate_at'])) ?></td>
                        <td>
                            <!---<a class="btn btn-sm btn-primary" href="#">
                                <i class="fas fa-eye"></i>
                            </a>-->
                            <a class="btn btn-sm btn-info"
                                href="<?= AdminURL . "edit-product.php?id=" . $oneProduct['productId']; ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger"
                                href="<?= AdminURL . "handelrs/handel-delete-product.php?id=" . $oneProduct['productId']; ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>