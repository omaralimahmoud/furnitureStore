<?php include("layouts/header.php"); ?>


<?php

use furnitureStore\Classes\Models\Category;
use furnitureStore\Classes\Models\Product;

if ($request->getHas('id')) {
    $id = $request->get('id');
    // echo $id;
} else {
    $id = 1;
}
$category = new Category;
$categories = $category->selectAll('id,name');
$product = new Product;
$productId = $product->selectID($id, "products.id AS productId, products.name AS productName,description,	price,pieces_number,image,categories.name AS categoryName , category_Id")

?>

<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Edit Product :
                <?= $productId['productName'] ?></h3>
            <div class="card">
                <div class="card-body p-5">

                    <?php include_once(AdminPATH . "layouts/errors.php") ?>
                    <form method="POST" action="<?= AdminURL . "handelrs/handel-edit-product.php" ?>"
                        enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?= $productId['productName'] ?>"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control name" name="category_id">

                                <?php foreach ($categories as $oneCategory) : ?>
                                <option value="<?= $oneCategory['id'] ?>" <?php if ($oneCategory['id'] == $productId['category_Id']) {
                                                                                    echo "selected";
                                                                                } ?>>
                                    <?= $oneCategory['name'] ?> </option>

                                <?php endforeach; ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" value="<?= $productId['price'] ?>" name="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Pieces</label>
                            <input type="number" value="<?= $productId['pieces_number'] ?>" name="pieces_number"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"
                                rows="3"><?= $productId['description'] ?></textarea>
                        </div>


                        <div class=" mb-2 d-flex justify-content-center">
                            <img src="<?= URL . "uploads/" . $productId['image'] ?>" height="100px" alt="">
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="#">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>