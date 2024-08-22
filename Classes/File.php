<?php
namespace furnitureStore\Classes;
class File
{
     private $name ,$tmpName, $uploadName;
     
     public function __construct(array $file)
     {
        $this->name = $file['name'];
        $this->tmpName= $file['tmp_name'];
     }
    
     public function rename()
     {
        $ext= pathinfo($this->name,PATHINFO_EXTENSION);
        $randomStr= uniqid();
        $this->uploadName= "$randomStr.$ext";
        return $this;
     }
     public function upload()
     {
        $destination= PATH ."uploads/".$this->uploadName;
        move_uploaded_file($this->tmpName,$destination);
        return $this->uploadName;
     }

     
}






///