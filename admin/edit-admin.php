<?php include("layouts/header.php"); ?>
<?php

use furnitureStore\Classes\Models\Admin;

if ($request->getHas('id')) {
    $id = $request->get('id');
    echo $id;
} else {
    $id = 1;
}

$admin = new Admin;
$adminID =  $admin->selectID($id, "id,name,email,roles");
?>


<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Add Admin</h3>
            <div class="card">
                <div class="card-body p-5">
                    <?php include_once(AdminPATH . "layouts/errors.php") ?>

                    <form method="POST" action="<?= AdminURL; ?>handelrs/handel-edit-admin.php">
                        <input type="hidden" name="id" value="<?= $id; ?>">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" disabled value="<?= $adminID['name'] ?>" name="name"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" disabled name="email" value="<?= $adminID['email'] ?>"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>roles</label>
                            <input type="text" value="<?= $adminID['roles'] ?>" class="form-control" disabled>
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