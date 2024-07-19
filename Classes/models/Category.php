<?php
class Category extends DataBase
{

    public function __construct()
    {
        $this->table = "categories";
        $this->connect();
    }
}