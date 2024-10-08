<?php require_once("../app.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techstore | Dashboard</title>

    <link rel="stylesheet" href="<?= AdminURL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= AdminURL; ?>assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
</head>

<body>
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Login</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <?php include_once(AdminPATH . 'layouts/success.php') ?>
                        <?php include_once(AdminPATH .  'layouts/errors.php'); ?>
                        <form method="POST" action="<?= AdminURL; ?>handelrs/handel-login.php">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src=" <?= AdminURL; ?>assets/js/jquery-3.5.1.min.js">
    </script>
    <script src="<?= AdminURL; ?>assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>