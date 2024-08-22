<?php include("layouts/header.php"); ?>
<?php
use furnitureStore\Classes\Models\Category;
$category= new Category;
 $categories=$category->selectAll("id,name");


?>
<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Add Product</h3>
            <div class="card">
                <div class="card-body p-5">
                    <?php include_once(AdminPATH."layouts/errors.php")?>
                    <form method="POST" action="<?= AdminURL;?>handelrs/handel-add-product.php"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <?php foreach($categories as $oneCategory):?>
                                <option value="<?= $oneCategory['id']?>"><?= $oneCategory['name']?></option>

                                <?php endforeach;?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Pieces</label>
                            <input type="number" name="pieces_number" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Image</label>
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="<?= AdminURL; ?>products.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>