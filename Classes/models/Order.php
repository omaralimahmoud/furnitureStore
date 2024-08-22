<?php

namespace furnitureStore\Classes\Models;

use furnitureStore\Classes\DataBase;

class Order extends dataBase
{

    public function __construct()
    {
        $this->table = "orders";
        $this->connect();
    }

    public function selectAll(string $fields = "*"): array
    {
        $sql = "SELECT $fields  FROM $this->table JOIN order_details JOIN products
      ON $this->table.id= order_details.order_id
      AND order_details.product_id = products.id
      GROUP BY $this->table.id";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function selectID($id, $fields = "*")
    {
        $sql = "SELECT $fields FROM $this->table JOIN order_details JOIN products
        
        ON orders.id= order_details.order_id
        AND order_details.product_id = products.id
        
         WHERE $this->table.id= $id ";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_assoc($result);
    }
}