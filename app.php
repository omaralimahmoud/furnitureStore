<?php

use furnitureStore\Classes\Request;
use furnitureStore\Classes\Session;
//path &url
define("PATH", __DIR__ . "/");
define("URL", "http://localhost/cvProjectPhp/furnitureStore/furnitureStore/");
//path &url admin
define("AdminPATH", __DIR__ . "/admin/");
define("AdminURL", "http://localhost/cvProjectPhp/furnitureStore/furnitureStore/admin/");



//DataBase Credentials
define('DB_SERVENAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'furniturestore');

//include Classes
require_once(PATH . "vendor/autoload.php");

//objects
$request = new Request;
$session = new Session;