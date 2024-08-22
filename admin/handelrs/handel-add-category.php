<?php

use furnitureStore\Classes\Models\Category;
use furnitureStore\Classes\Validation\Validator;

require_once("../../app.php");
if ($request->postHas('submit')) {
    $name=  $request->post('name');
    //echo $name;

     $validator=new Validator;
     $validator->validate('name',$name,['required','str','max']);

     if ($validator->hasErrors()) {
        $session->set('errors',$validator->getErrors());
        $request->AdminRedirect('add-category.php');
        
     }else{
        $category= new Category;
        $category->insert('name',"'$name'");
        $session->set('success','category add successfully');
        $request->AdminRedirect('categories.php');
     }
    
}else{
    $request->AdminRedirect('add-category.php');
}






///