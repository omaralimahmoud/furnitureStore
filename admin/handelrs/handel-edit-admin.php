<?php

use furnitureStore\Classes\Models\Admin;
use furnitureStore\Classes\Models\Category;
use furnitureStore\Classes\Validation\Validator;

require_once("../../app.php");
if ($request->postHas('submit')) {
   $id = $request->post('id');
   $password = $request->post('password');
   $confirm_password = $request->post('confirm_password');

   $validator = new Validator;
   $validator->validate('password', $password, ['required', 'str', 'max']);
   $validator->validate('confirm_password', $confirm_password, ['required', 'str', 'max']);
   if ($password !== $confirm_password) {
      $session->set('errors', ['password' => 'Passwords do not match']);

      return $request->AdminRedirect('edit-admin.php');
   }
   if ($validator->hasErrors()) {
      $session->set('errors', $validator->getErrors());
      $request->AdminRedirect('edit-admin.php');
   } else {
      $hashPassword = password_hash($password, PASSWORD_DEFAULT);

      $admin = new Admin;
      $admin->update("password= '$hashPassword'", $id);
      $session->set('success', 'admin edit successfully');
      $request->AdminRedirect('admins.php');
   }
} else {
   $request->AdminRedirect('edit-admin.php');
}








///