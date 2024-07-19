<?php
class Product extends DataBase
{

    public function __construct()
    {
        $this->table = "products";
        $this->connect();
    }
}