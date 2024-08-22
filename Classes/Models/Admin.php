<?php
namespace furnitureStore\Classes\Models;
use furnitureStore\Classes\DataBase;
use furnitureStore\Classes\Session;

class Admin extends dataBase
{
   private $roles = [];


    public function __construct()
    {
        $this->table = "admins";
        $this->connect();
    }


   

    public function addRole($role)
    {
        $this->roles[]=$role;
    }
    public function selectAllAdmin()
    {
        $sql = "SHOW COLUMNS FROM $this->table LIKE 'roles' ";
        $result = mysqli_query($this->Connection, $sql);
        $row = $result->fetch_assoc();
        $type = $row['Type'];
        preg_match('/enum\((.*)\)$/', $type, $matches);
        $value = explode(',',$matches[1]);
        return $value;
    }

    public function hasRole($role)
    {
        return in_array($role,$this->roles);
    }

    public function getRoles()
    {
        return $this->roles;
    }
    
    public function isEmailExists($email)
    {
        
        
        $sql = "SELECT email FROM $this->table WHERE email = '$email'";
        
        $result = mysqli_query($this->Connection, $sql);
        
        // Check if query executed successfully
        if ($result) {
            $row = $result->fetch_assoc();
            return (is_array($row) && count($row) > 0);
        } else {
            return false;
        }
    }
    
   

    public function login($email,$password,Session $session)
    {
        $sql= "SELECT * from $this->table WHERE email = '$email' LIMIT 1 ";
        $result = mysqli_query($this->Connection, $sql);
         $admin= mysqli_fetch_assoc($result);
        
        if (!empty($admin)) {
             $hashPassword= $admin['password'];
             $isSame=password_verify($password,$hashPassword);
             if ($isSame) {
                $session->set('adminId',$admin['id']);
                $session->set('adminName',$admin['name']);
                $session->set('adminEmail',$admin['email']);
                $session->set('role',$admin['roles']);
                return true;
             }else{
                return false;
             }
            
        }else{
            return false;
        }

    }


    public function logout(Session $session)
    {
        $session->remove('adminId');
        $session->remove('adminName');
        $session->remove('adminEmail');
        $session->remove('role');
    }
}