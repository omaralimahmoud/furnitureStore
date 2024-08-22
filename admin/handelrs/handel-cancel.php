<?php
require_once('../../app.php');
use furnitureStore\Classes\Models\Order;



if ($request->getHas('id')) {
   $id=  $request->get('id');

   $order= new Order;
   $order->update("status = 'canceled'",$id);

   $session->set('success',"order canceled");
   $request->AdminRedirect('order.php?id='.$id);
   
}