<?php
    //START HERE
    session_start();

    //constants to store non repeating values
define('LOCALHOST', 'localhost');
define('URL', '../');    //THIS IS URL FOR DELETEADMIN.PHP  //http://localhost:8888/final //    ../
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');    
define('DB_NAME', 'food');  //food database because it is on xampp, I realize mamp and xammp are different -_-

//You do this too $APP_CONFIG = [
   // 'environment' => 'development',
   // 'site_name' => 'J-Wahashi',
   // 'site_url' => 'http://localhost:8888/final',
   // 'database_host' => 'localhost',
   // 'database_user' => 'root',
    //'database_pass' => 'root',
    //'database_name' => 'jun',
//];

    $conn = mysqli_connect('localhost', 'root','root') or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn, 'food') or die(mysqli_error()); //selecting DB



?>