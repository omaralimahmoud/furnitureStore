<?php
require_once('../app.php');

use furnitureStore\Classes\Cart;
use furnitureStore\Classes\Models\Order;
use furnitureStore\Classes\Models\OrderDetail;
use furnitureStore\Classes\Validation\Validator;

$cart = new Cart;

if ($request->postHas('submit') && $cart->count() !== 0) {

    $name = $request->post('name');
    $email = $request->post('email');
    $adderess = $request->post('adderess');
    $phone = $request->post('phone');


    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('email', $email, ['required', 'str', 'max', 'email']);
    $validator->validate('phone', $phone, ['required', 'str', 'max']);
    if (!empty($adderess)) {
        $validator->validate('adderess', $adderess, ['required', 'str', 'max']);
        $adderess = "'$adderess'";
    } else {
        $adderess = "NULL";
    }

    if ($validator->hasErrors()) {

        $session->set("errors", $validator->getErrors());
        $request->redirect('cart.php');
    } else {
        $order = new Order;
        $orderDetail = new OrderDetail;
        $orderId = $order->insertAndGetId("name,email,phone,adderess	", "'$name','$email','$phone',$adderess");
        foreach ($cart->all() as $productId => $productData) {
            $quantity = $productData['quantity'];
            $orderDetail->insert("order_id,product_id,quantity", "'$orderId','$productId','$quantity'");
        }
        $cart->empty();
        $request->redirect('products.php');
    }
} else {
    $request->redirect('products.php');
}

//