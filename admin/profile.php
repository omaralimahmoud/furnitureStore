<?php include("layouts/header.php"); ?>
<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Edit Profile</h3>
            <div class="card">
                <div class="card-body p-5">
                    <form method="POST" action="<?= AdminURL; ?>handelrs/handel-profile.php">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                                value="<?= $session->get('adminName') ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="<?= $session->get('adminEmail') ?> ">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control">
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-dark" href="<?= AdminURL; ?>">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>