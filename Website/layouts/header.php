<?php require_once('app.php'); ?>
<?php
use furnitureStore\Classes\Models\Category;
use  furnitureStore\Classes\Cart;
$category = new Category;
$categories =  $category->selectAll("id,name");
$cart = new Cart;
$cartCount = $cart->count();
$cartTotal = $cart->total();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->

    <link href="<?= URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="<?= URL; ?>assets/css/tiny-slider.css" rel="stylesheet">
    <link href="<?= URL; ?>assets/css/style.css" rel="stylesheet">



    <title>furnitureStore </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="<?= URL; ?>index.php ">furnitureStore<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= URL; ?>index.php">Home</a>
                    </li>
                    <li><a class="nav-link" href="<?= URL ?>products.php">products</a></li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="Category.php" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu   bg-success  shadow-none" aria-labelledby="navbarDropdown">

                            <?php foreach ($categories as $onecategory) : ?>
                            <li><a class=" dropdown-item"
                                    href="Category.php?id=<?= $onecategory['id']; ?> "><?= $onecategory['name']; ?></a>
                            </li>
                            <?php endforeach; ?>


                        </ul>
                    </li>
                    <li><a class=" nav-link" href="#">Contact us</a></li>



                    <li><a class="nav-link" href="<?= URL ?>cart.php"><img src="assets/images/cart.svg">
                            <span>
                                <h2><?= $cartCount; ?></h2>
                            </span>
                        </a></li>


                    <li><a class="nav-link" href="<?= URL ?>cart.php"><img
                                src="assets/images/bag.svg"><?= $cartTotal; ?></a></li>


                </ul>


            </div>
        </div>
        <form class="d-flex" method="get" action="<?= URL; ?>search.php">
            <input class="form-control me-sm" type="search" name="keyword" placeholder="Search">
            <button class="btn" type="submit">Search</button>
        </form>
    </nav>
    <!-- End Header/Navigation -->