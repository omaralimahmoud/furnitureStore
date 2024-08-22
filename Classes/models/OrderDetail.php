<?php
namespace furnitureStore\Classes\Models;
use furnitureStore\Classes\DataBase;
class OrderDetail extends DataBase
{

    public function __construct()
    {
        $this->table = "order_details";
        $this->connect();
    }

    public function selectWithProduct($orderId)
    {
        $sql = "SELECT name , price, quantity  FROM $this->table  JOIN products
        ON $this->table.product_id= products.id
        WHERE order_id =$orderId ";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
}