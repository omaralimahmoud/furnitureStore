<?php
require_once('../../app.php');


use furnitureStore\Classes\Validation\Validator;

use furnitureStore\Classes\Models\Admin;

if ($request->postHas('submit') ) {

   
    $email = $request->post('email');
    $password = $request->post('password');



    $validator = new Validator;

    $validator->validate('email', $email, ['required', 'str', 'max', 'email']);
    $validator->validate('password', $password, ['required', 'str', 'max']);

   

    if ($validator->hasErrors()) {

        $session->set("errors", $validator->getErrors());
        $request->AdminRedirect('login.php');
        
    } else {
        $admin= new Admin;
       $isLogin= $admin->login($email,$password,$session);
        if ($isLogin) {
            $request->AdminRedirect('index.php');
        }else{
            $session->set('errors',['credentials are not correct']);
            $request->AdminRedirect('login.php');
        }
       
    }
} else {
    $request->AdminRedirect('login.php');
}

//