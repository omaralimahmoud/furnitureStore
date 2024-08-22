<?php include("layouts/header.php"); ?>
<?php

use furnitureStore\Classes\Models\Admin;
use furnitureStore\Classes\Models\Category;

$category = new Category;
$categories =    $category->selectAll();

?>
<div class="container-fluid py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>All Categories</h3>
                <a href="<?= AdminURL; ?>add-category.php" class="btn btn-success">
                    Add new
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $index => $oneCategory): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= $oneCategory['name'] ?></td>
                        <td><?= date("d-n-Y-h:i:s-a", strtotime($oneCategory['created_at'])) ?></td>
                        <td>


                            <a class="btn btn-sm btn-info"
                                href="<?= AdminURL  . "edit-category.php?id=" . $oneCategory['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>


                            <a class="btn btn-sm btn-danger"
                                href="<?= AdminURL . "handelrs/handel-delete-category.php?id=" . $oneCategory['id'] ?>">
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