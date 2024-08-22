<?php

use furnitureStore\Classes\Models\Category;
use furnitureStore\Classes\Validation\Validator;

require_once("../../app.php");
if ($request->postHas('submit')) {
    $id= $request->post('id');
    
    $name=  $request->post('name');
    //echo $name;

     $validator=new Validator;
     $validator->validate('name',$name,['required','str','max']);

     if ($validator->hasErrors()) {
        $session->set('errors',$validator->getErrors());
        $request->AdminRedirect('edit-category.php');
        
     }else{
        $category= new Category;
        $category->update("name= '$name'",$id);
        $session->set('success','category edit successfully');
        $request->AdminRedirect('categories.php');
     }
    
}else{
    $request->AdminRedirect('edit-category.php');
}








///