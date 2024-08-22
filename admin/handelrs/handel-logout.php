<?php
require_once('../../app.php');
use furnitureStore\Classes\Models\Admin;


    $admin= new Admin;
$admin->logout($session);
 $request->AdminRedirect('login.php');