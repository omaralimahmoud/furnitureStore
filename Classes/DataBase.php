<?php
namespace furnitureStore\Classes;
class dataBase
{
    protected  $Connection;
    protected  $table;

    public function connect()

    {
        $this->Connection = mysqli_connect(DB_SERVENAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }


    public function selectAll(string $fields = "*"): array
    {
        $sql = "SELECT $fields FROM $this->table";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function selectID($id, $fields = "*")
    {
        $sql = "SELECT $fields FROM $this->table WHERE id= $id ";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_assoc($result);
    }
    public function selectWere($conditions, $fields = "*"): array
    {
        $sql = "SELECT $fields FROM $this->table WHERE $conditions ";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function getCount(): int
    {
        $sql = "SELECT COUNT(*) AS ResultCount FROM $this->table ";
        $result = mysqli_query($this->Connection, $sql);
        return mysqli_fetch_assoc($result)['ResultCount'];
    }


    public function insert(string $fields, string $values): bool
    {
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values) ";
        return  $result = mysqli_query($this->Connection, $sql);
    }
    public function insertAndGetId(string $fields, string $values)
    {
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values) ";
        $result = mysqli_query($this->Connection, $sql);
          return mysqli_insert_id($this->Connection);
    }


    public function update(string $set, $id): bool
    {
        $sql = "UPDATE  $this->table SET $set WHERE id= $id ";
        return  $result = mysqli_query($this->Connection, $sql);
    }
    public function delete($id): bool
    {
        $sql = "DELETE FROM  $this->table  WHERE id= $id ";
        return  $result = mysqli_query($this->Connection, $sql);
    }
}