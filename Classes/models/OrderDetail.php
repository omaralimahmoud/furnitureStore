<?php
class OrderDetail extends DataBase
{

    public function __construct()
    {
        $this->table = "order_details";
        $this->connect();
    }
}