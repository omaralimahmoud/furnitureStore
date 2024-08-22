<?php
require_once('../../app.php');


use furnitureStore\Classes\Validation\Validator;

use furnitureStore\Classes\Models\Admin;

if ($request->postHas('submit') ) {

   $name= $request->post('name');
    $email = $request->post('email');
    $password = $request->post('password');
    $confirm_password= $request->post('confirm_password');



    $validator = new Validator;
    $validator->validate('name',$name,['required','str','max']);
    $validator->validate('email', $email, ['required', 'str', 'max', 'email']);
    if (!empty($password) && ! $password == $confirm_password) {
        $validator->validate('password', $password, ['required', 'str', 'max']);
    }

   

    if ($validator->hasErrors()) {

        $session->set("errors", $validator->getErrors());
        $request->AdminRedirect('profile.php');
        
    } else {
        $admin= new Admin;

        if (!empty($password)) {
            $hashPassword=password_hash($password,PASSWORD_DEFAULT);
            $admin->update("name= '$name', email= '$email', `password` = '$hashPassword'",$session->get('adminId'));
        }else{
            $admin->update("name= '$name', email= '$email'",$session->get('adminId'));

        }
        $session->set('success','profile edited successfully');
        $request->AdminRedirect('handelrs/handel-logout.php');
       
    }
} else {
    $request->AdminRedirect('login.php');
}

//