<?php
require_once('../app.php');

use furnitureStore\Classes\Cart;

if ($request->getHas('id')) {
   $id = $request->get('id');
   $cart = new Cart;
   $cart->remove($id);
   $request->redirect("cart.php");
}




//*