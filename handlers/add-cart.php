<?php
require_once('../app.php');

use furnitureStore\Classes\Cart;

if ($request->postHas('submit')) {
    $id = $request->post('id');
    $quantity =   $request->post('quantity');
    $name = $request->post('name');
    $image = $request->post('image');
    $price = $request->post('price');
    $productData = [
        'quantity' => $quantity,
        'name' => $name,
        'image' => $image,
        'price' => $price,
    ];

    $cart = new Cart;
    $cart->Add($id, $productData);

    $request->redirect('products.php');
}

//