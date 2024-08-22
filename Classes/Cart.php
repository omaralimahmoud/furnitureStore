<?php

namespace furnitureStore\Classes;

class Cart
{

    public function Add(string $id, array $productData)
    {
        $_SESSION['cart'][$id] = $productData;
    }
    public function count()
    {
        if (isset($_SESSION['cart'])) {
            return   count($_SESSION['cart']);
        }else{
              return 0; 
        }
      
    }

    public function total()
    {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart']  as $id => $productData) {
                $total += $productData['quantity'] * $productData['price'];
            }
        }
        
        return $total;
    }
    public function Has(string $id): bool
    {
        if (isset($_SESSION['cart'])) {
            return  array_key_exists($id, $_SESSION['cart']);

        }else{
            return false;
        }
    }

    public function all()
    {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];

        }else{
            return [];
        }
    }
    public function remove(string $id)
    {
        unset($_SESSION['cart'][$id]);
    }
    public function empty()
    {
        $_SESSION['cart']=[];
    }
}