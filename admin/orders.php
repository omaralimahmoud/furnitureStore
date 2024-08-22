<?php include("layouts/header.php"); ?>
<?php

use furnitureStore\Classes\Models\Admin;
use furnitureStore\Classes\Models\Order;

$order = new Order;
$orders = $order->selectAll("orders.id, orders.name, orders.phone, orders.status, orders.created_at, SUM(quantity* price) AS total");
?>
<div class="container-fluid py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>All Orders</h3>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>



                    <?php foreach ($orders as $index => $order): ?>
                    <tr>
                        <th><?= $index + 1 ?></th>

                        <td><?= $order['name'] ?></td>
                        <td><?= $order['phone'] ?></td>
                        <td><?= $order['total'] ?></td>
                        <td><?= date("d-n-Y-h:i:s-a", strtotime($order['created_at'])) ?></td>
                        <td><?= $order['status'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="<?= AdminURL . "order.php?id=" . $order['id']; ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>