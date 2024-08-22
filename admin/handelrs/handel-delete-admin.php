<?php
require_once('../../app.php');

use furnitureStore\Classes\Models\Admin;


if ($request->getHas('id')) {
   $id=  $request->get('id');

  $admin= new Admin;
  
  $admin->delete($id);
   
   $session->set('success','admin deleted successfully');
   $request->AdminRedirect('admins.php');
   
}















///