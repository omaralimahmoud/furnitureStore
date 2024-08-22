<?php include('Website/layouts/header.php'); ?>


<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">

                    <h1>Cart</h1>
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



<div class="untree_co-section before-footer-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($cart->all() as $id => $productData) : ?>
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="<?= URL . "uploads/" . $productData['image'] ?>" alt="Image"
                                        class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black"> <?= $productData['name'] ?>
                                    </h2>
                                </td>
                                <td><?= $productData['price'] ?></td>
                                <td>

                                    <?= $productData['quantity'] ?>
                                </td>
                                <td><?= $productData['price'] * $productData['quantity'] ?></td>
                                <td><a href="<?= URL . "handlers/remove-cart.php?id=" . $id ?>"
                                        class="btn btn-danger "><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>


        <form method="POST" action="<?= URL; ?>handlers/add-order.php">
            <div class="untree_co-section">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <h2 class="h3 mb-3 text-black">Billing Details</h2>
                            <?php if ($session->has('errors')) : ?>
                            <div class=" alert alert-danger ">
                                <?php foreach ($session->get('errors')  as $error) : ?>
                                <p> <?= $error; ?></p>
                                <?php endforeach;
                                    $session->remove("errors"); ?>
                            </div>
                            <?php endif; ?>
                            <div class="p-3 p-lg-5 border bg-white">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black"> Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_fname" name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_email_address" class="text-black">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_email_address" name="email">
                                    </div>

                                </div>



                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_address" class="text-black">Address <span
                                                class="text-danger"></span></label>
                                        <input type="text" class="form-control" id="c_address" name="adderess"
                                            placeholder="Street address">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_phone" class="text-black">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_phone" name="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>



                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12 text-right border-bottom mb-5">
                                            <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <span class="text-black">Total</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <strong class="text-black"><?= $cartTotal; ?></strong>

                                        </div>
                                    </div>


                                </div>




                                <div class="form-group m-3">
                                    <button class="btn btn-black btn-lg py-3 btn-block" type="submit"
                                        name="submit">Place
                                        Order</button>
                                </div>


                            </div>
                        </div>

                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </form>







    </div>
</div>








<?php include('Website/layouts/footer.php'); ?>