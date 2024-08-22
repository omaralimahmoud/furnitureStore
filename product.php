<?php include('Website/layouts/header.php'); ?>

<?php

use furnitureStore\Classes\Models\Product;

if ($request->getHas('id')) {
    $id = $request->get('id');
} else {
    $id = 1;
}

$product = new Product;
$productId =  $product->selectID($id,"products.id AS productId ,products.name As productName, `description`,price,image,categories.name As categoryName ");

?>

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">

                    <h1>product</h1>
                    <h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
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

<?php if(!empty($productId)) : ?>

<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post" action=" <?= URL;?>handlers/add-cart.php">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-thumbnail">CategoryName</th>
                                <th class="product-name">ProductName</th>
                                <th class="product-name">description</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="<?= URL . "uploads/" . $productId['image'];?>" alt="Image"
                                        class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black"><?=$productId['categoryName'];?></h2>
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black"><?=$productId['productName'];?></h2>
                                </td>
                                <td class=" product-name">
                                    <p class=" text-black"> <?=$productId['description'];?></p>
                                </td>
                                <td>$<?=$productId['price'];?></td>
                                <td>
                                    <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                        style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-black decrease"
                                                type="button">&minus;</button>
                                        </div>
                                        <input type="text" name="quantity"
                                            class="form-control text-center quantity-amount" value="1" placeholder=""
                                            aria-label="Example text with button addon"
                                            aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                        </div>
                                    </div>

                                </td>
                                <td>$49.00</td>
                                <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="id" value="<?=$productId['productId'];?>">
                <input type="hidden" name="name" value="<?=$productId['productName'];?>">
                <input type="hidden" name="price" value="<?=$productId['price'];?>">
                <input type="hidden" name="image" value="<?=$productId['image'];?>">


                <?php if(!$cart->Has($productId['productId'])):  ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <button class="btn btn-black btn-sm btn-block " type="submit" name="submit">Add To
                                    Cart</button>
                            </div>

                        </div>

                    </div>

                </div>
                <?php endif;?>
            </form>
        </div>


    </div>
</div>
<?php else:?>
<div class="untree_co-section before-footer-section  text-center">
    <h2>No Data Found</h2>
    <a href="index.php">
        <button type="button" class="btn btn-secondary btn-lg">Large button</button>
    </a>


</div>


<?php endif;?>
<?php include('Website/layouts/footer.php'); ?>