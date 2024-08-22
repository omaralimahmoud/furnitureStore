<?php include("layouts/header.php"); ?>
<?php

use furnitureStore\Classes\Models\Admin;
use furnitureStore\Classes\Models\Order;
use furnitureStore\Classes\Models\OrderDetail;
if ($request->getHas('id')) {
    $id = $request->get('id');
    // echo $id;
} else {
    $id = 1;
}
$order = new Order;
$orderId =  $order->selectID($id, 'orders.*, sum(quantity*price) AS total');
$orderDetail = new OrderDetail;
$Details =  $orderDetail->selectWithProduct($id);
?>

<div class="container py-5">
    <div class="row">

        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Show Order :<?= $orderId['id'] ?> </h3>
            <div class="card">
                <div class="card-body p-5">
                    <table class="table table-bordered">
                        <thead>
                            <th colspan="2" class="text-center">Customer</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td><?= $orderId['name'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td><?= $orderId['email'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td><?= $orderId['phone'] ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td> <?= $orderId['adderess'] ?? "..." ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Time</th>
                                <td><?= date("d-n-Y-h:i:s-a", strtotime($orderId['created_at'])) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>
                                    <?= $orderId['status'] ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php foreach ($Details as $detail) : ?>
                            <tr>
                                <td> <?= $detail['name'] ?> </td>
                                <td><?= $detail['quantity'] ?></td>
                                <td>$<?= $detail['price'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Total</th>
                                <?php if ($orderId['status'] == 'pending') : ?>
                                <th>Change Status</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$<?= $orderId['total'] ?>
                                </td>


                                <?php if ($orderId['status'] == 'pending') : ?>
                                <td>
                                    <a class="btn btn-success"
                                        href="<?= AdminURL . "handelrs/handel-approve.php?id=" . $orderId['id'] ?>">Approve</a>
                                    <a class="btn btn-danger"
                                        href="<?= AdminURL . "handelrs/handel-cancel.php?id=" . $orderId['id'] ?>">Cancel</a>
                                </td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>

                    <a class="btn btn-dark" href="<?= AdminURL . "orders.php"; ?>">Back</a>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include("layouts/footer.php"); ?>