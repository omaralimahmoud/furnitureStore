<?php include('Website/layouts/header.php'); ?>
<?php

use furnitureStore\Classes\Models\Product;

if ($request->getHas('id')) {
    $id =  $request->get('id');
} else {
    $id = 1;
}

$categoryId = $category->selectID($id);

$product = new Product;
$products = $product->selectWere("category_id  = $id", "id , name ,image , price");


?>

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">

                    <h1 class=" text-dark ">

                        <?php if (!empty($categoryId)) : ?>
                        <?= $categoryId['name']; ?>
                        <?php else : ?>
                        <?= "No Category Found"; ?>
                        <?php endif;  ?>

                    </h1>





                    <h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                        Aliquam
                        vulputate velit imperdiet dolor tempor tristique.</p>

                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="<?= URL; ?>assets/images/couch.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->


<?php if (!empty($categoryId)) : ?>
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <?php foreach ($products as $oneProduct) : ?>
            <!-- Start Column 1 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
                <a class="product-item" href="<?= URL; ?>product.php?id=<?= $oneProduct['id']; ?>">
                    <img src="<?= URL . "uploads/" . $oneProduct['image']; ?>" class="img-fluid product-thumbnail">
                    <h3 class="product-title"><?= $oneProduct['name']; ?></h3>
                    <strong class=" product-price">$<?= $oneProduct['price']; ?></strong>

                    <span class="icon-cross">
                        <img src="<?= URL; ?>assets/images/cross.svg" class="img-fluid">
                    </span>
                </a>
            </div>
            <!-- End Column 1 -->
            <?php endforeach; ?>


        </div>
    </div>
</div>
<?php else : ?>
<div style=" height: 200px;">

</div>
<?php endif; ?>
<?php include('Website/layouts/footer.php'); ?>