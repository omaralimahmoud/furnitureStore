<?php
namespace furnitureStore\Classes\Models;
use furnitureStore\Classes\DataBase;
class Category extends DataBase
{

    public function __construct()
    {
        $this->table = "categories";
        $this->connect();
    }
}