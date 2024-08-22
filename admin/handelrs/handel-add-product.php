<?php
require_once('../../app.php');
use furnitureStore\Classes\Validation\Validator;
use furnitureStore\Classes\Models\Product;
use furnitureStore\Classes\File;
if ($request->postHas('submit') ) {

    $name = $request->post('name');
    $category_id = $request->post('category_id');
    $price = $request->post('price');
    $pieces_number = $request->post('pieces_number');
    $description= $request->post('description');
    //image
     $image= $request->files('image');


    // print_r($image);
    $validator = new Validator;

    $validator->validate('name', $name, ['required', 'str', 'max']);
    $validator->validate('category_id', $category_id, ['required', 'numeric']);
    $validator->validate('price', $price, ['required', 'numeric']);
    $validator->validate('pieces_number',$pieces_number,['required','numeric']);
    $validator->validate('description',$description,['required','str']);
    $validator->validate('image',$image,['requiredfile','image']);

    if ($validator->hasErrors()) {

        $session->set("errors", $validator->getErrors());
        $request->AdminRedirect('add-product.php');
    } else {

        $file =new File($image);
       $imageUploadName= $file->rename()->upload();
        $product =new Product;
        $product->insert("name,description,price,pieces_number,image,category_id",
        "'$name','$description','$price', '$pieces_number','$imageUploadName','$category_id'");
        $session->set('success','product added successfully');
        $request->AdminRedirect('products.php');
      
    }
} else {
    $request->AdminRedirect('add-product.php');
}








///