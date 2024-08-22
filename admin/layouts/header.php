<?php require_once("../app.php"); ?>
<?php
if (! $session->has('adminId')) {
    $request->AdminRedirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>furnitureStore | Dashboard</title>

    <link rel="stylesheet" href="<?= AdminURL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= AdminURL; ?>assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= AdminURL; ?>index.php">furnitureStore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= AdminURL; ?>products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= AdminURL; ?>categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= AdminURL; ?>orders.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= AdminURL; ?>admins.php">Admins</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $session->get('adminName');?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= AdminURL; ?>profile.php">Profile
                        </a>
                        <a class="dropdown-item" href="<?= AdminURL; ?>handelrs/handel-logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <?php include_once(AdminPATH.'layouts/success.php')?>