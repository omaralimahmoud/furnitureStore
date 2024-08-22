<?php
require_once("../../app.php");
use furnitureStore\Classes\Models\Product;

if($request->getHas('id'))
{
    
   $id= $request->get('id');
   $product= new Product;
    
   $imageName=  $product->selectID($id,'image')['image'];
   unlink(PATH ."uploads/$imageName");

   $product->delete($id);

   $session->set('success','product deleted successfully');
   $request->AdminRedirect('products.php');
}




///