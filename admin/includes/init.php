<?php 

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'gallery'); // this is the path or the location of all my files in xampp 

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS .'includes'); // eto naman yung location pag nasa htdocs/gallery kana

/***** REMINDER KAILANGAN YUNG ORDER NG FILE NA TINATAWAG IS NAKA ORDER FROM INHERITED CLASS ******/
require_once("functions.php");
require_once("config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");   
require_once("comment.php");
require_once("session.php"); 
require_once("paginate.php");


// require_once "login.php";
// require_once "./logout.php";


?>