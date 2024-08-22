<?php include("layouts/header.php"); ?>
<?php
if ($request->getHas('id')) {
    $id= $request->get('id');
   // echo $id;
}else{
    $id= 1;
  //  echo $id;
}

 use furnitureStore\Classes\Models\Category;

 $category= new Category;
  $categoryId= $category->selectID($id,"name,id");
  // print_r($categoryId);

?>

<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Edit Category : name here</h3>
            <div class="card">
                <div class="card-body p-5">
                    <form method="post" action="<?= AdminURL ;?>handelrs/handel-edit-category.php">
                        <input type="hidden" name="id" value="<?= $id; ?>">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="<?=$categoryId['name']?>" name="name" class="form-control">
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="<?=AdminURL;?>categories.php">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>