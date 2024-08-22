<?php

use furnitureStore\Classes\Models\Category;

require_once('../../app.php');
if ($request->getHas('id')) {
   $id=  $request->get('id');

  $category= new Category;
  
  $category->delete($id);
   
   $session->set('success','category deleted successfully');
   $request->AdminRedirect('categories.php');
   
}















///