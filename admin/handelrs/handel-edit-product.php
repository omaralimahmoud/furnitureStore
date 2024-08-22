<?php
require_once('../../app.php');

use furnitureStore\Classes\Validation\Validator;
use furnitureStore\Classes\Models\Product;
use furnitureStore\Classes\File;

if ($request->postHas('submit')) {
    $id = $request->post('id');
    $name = $request->post('name');
    $description = $request->post('description');
    $price = $request->post('price');
    $category_id = $request->post('category_id');
    $pieces_number = $request->post('pieces_number');
    //image
    $image = $request->files('image');


    // print_r($image);
    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('description', $description, ['required', 'str']);
    $validator->validate('price', $price, ['required', 'numeric']);
    $validator->validate('category_id', $category_id, ['required', 'numeric']);
    $validator->validate('pieces_number', $pieces_number, ['required', 'numeric']);
    if ($image['error'] == 0) {
        $validator->validate('image', $image, ['image']);
    }

    if ($validator->hasErrors()) {

        $session->set("errors", $validator->getErrors());
        $request->AdminRedirect('edit-product.php');
    } else {
        $product = new Product;
        $imageName = $product->selectID($id, 'image')['image'];

        if ($image['error'] == 0) {
            unlink(PATH . "uploads/$imageName");
            $file = new File($image);
            $imageName = $file->rename()->upload();
        }

        $product->update("name = '$name', description = '$description', 
        price = '$price', category_id = '$category_id', pieces_number = '$pieces_number', image = '$imageName'
         ", $id);



        $session->set('success', 'product updated successfully');
        $request->AdminRedirect('products.php');
    }
} else {
    $request->AdminRedirect('edit-product.php');
}








///