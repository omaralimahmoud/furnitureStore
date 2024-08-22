<?php include("layouts/header.php"); ?>
<?php


use furnitureStore\Classes\Models\Admin;

$admin= new Admin;
 $admins=  $admin->selectAll("id, name , email, roles");
 //print_r($admins);
?>

<div class="container-fluid py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>All Admins</h3>
                <a href="<?= AdminURL; ?>add-admin.php" class="btn btn-success">
                    Add new
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>

                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($admins as $index=> $oneAdmin):?>
                    <tr>
                        <th scope="row"><?= $index+1 ?></th>
                        <td><?= $oneAdmin['name']?></td>
                        <td><?= $oneAdmin['email']?></td>
                        <td><?= $oneAdmin['roles']?></td>

                        <td>
                            <a class="btn btn-sm btn-info"
                                href="<?= AdminURL . "edit-admin.php?id=". $oneAdmin['id'] ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger"
                                href="<?= AdminURL ."handelrs/handel-delete-admin.php?id=" . $oneAdmin['id'] ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>