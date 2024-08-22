<?php

namespace furnitureStore\Classes\Validation;

class image implements ValidationRule
{
     public function check(string $name, $value)
     { 
        $allowedExt=['jpg','png','jpeg','gif'];
        $Ext= pathinfo($value['name'],PATHINFO_EXTENSION);
        
        
          if (!in_array($Ext,$allowedExt)) {
               return "$name  extension  is not allowed please upload jpg,png,gif,jpeg";
          }
          return false;
     }
}