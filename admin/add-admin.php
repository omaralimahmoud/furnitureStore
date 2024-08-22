<?php include("layouts/header.php"); ?>
<?php

use furnitureStore\Classes\Models\Admin;

$admin = new Admin;
$admins =  $admin->selectAllAdmin();
//print_r($admins);
//print_r($_SESSION)


?>
<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Add Admin</h3>
            <div class="card">
                <div class="card-body p-5">
                    <?php include_once(AdminPATH . "layouts/errors.php") ?>

                    <form method="POST" action="<?= AdminURL; ?>handelrs/handel-add-admin.php">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>roles</label>
                            <select class="form-control name" name="role">



                                <?php foreach ($admins as $oneAdmin) : ?>
                                <option value="<?= trim($oneAdmin, "'") ?>">
                                    <?= trim($oneAdmin, "'") ?>
                                </option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>confirm_password</label>
                            <input type="text" name="confirm_password" class="form-control">
                        </div>
                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="<?= AdminURL; ?>admins.php">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>