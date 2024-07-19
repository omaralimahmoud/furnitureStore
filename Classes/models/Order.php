<?php
class Order extends dataBase
{

    public function __construct()
    {
        $this->table = "orders";
        $this->connect();
    }
}