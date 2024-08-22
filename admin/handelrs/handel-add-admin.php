<?php

require_once("../../app.php");

use furnitureStore\Classes\Models\Admin;
use furnitureStore\Classes\Validation\Validator;

if ($request->postHas('submit')) {
  $name =  $request->post('name');
  $email = $request->post('email');
  $role = $request->post('role');
  $phone = $request->post('phone');
  $password = $request->post('password');
  $confirm_password = $request->post('confirm_password');


  $validator = new Validator;
  $validator->validate('name', $name, ['required', 'str', 'max']);
  $validator->validate('email', $email, ['required', 'str', 'max', 'email']);

  $validator->validate('role', $role, ['str']);
  $validator->validate('phone', $phone, ['str', 'max']);
  $validator->validate('password', $password, ['required', 'str', 'max']);
  $validator->validate('confirm_password', $confirm_password, ['required', 'str', 'max']);
  if ($password !== $confirm_password) {
    $session->set('errors', ['password' => 'Passwords do not match']);

    return $request->AdminRedirect('add-admin.php');
  }

  if ($validator->hasErrors()) {
    $session->set('errors', $validator->getErrors());
    $request->AdminRedirect('add-admin.php');
  } else {
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $admin = new Admin;
    $roleAdd =   $admin->addRole($role);
    if ($admin->isEmailExists($email)) {
      $session->set('errors', ['email' => 'Email address is already exists']);
      return $request->AdminRedirect('add-admin.php');
      exit();
    }

    $admin->insert("name,email,roles,phone,password", "'$name','$email','$role','$phone','$hashPassword'");

    $session->set('success', 'admin add successfully');
    $request->AdminRedirect('admins.php');
  }
} else {
  $request->AdminRedirect('add-admin.php');
}






///