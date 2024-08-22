<?php
namespace furnitureStore\Classes\Models;
use furnitureStore\Classes\DataBase;
class Product extends DataBase
{

    public function __construct()
    {
        $this->table = "products";
        $this->connect();
    }

    public function selectID($id, $fields = "products.*")
    {
        $sql = "SELECT $fields FROM $this->table JOIN categories
        ON $this->table.category_id=categories.id
        WHERE $this->table.id= $id";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function selectAllWithCategories(string $fields = "*"): array
    {
        $sql = "SELECT $fields FROM $this->table JOIN Categories
        ON  $this->table.category_id= categories.id
        ORDER By $this->table.id DESC ";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}