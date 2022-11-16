<?php
    //START HERE
    session_start();

    //constants to store non repeating values
define('LOCALHOST', 'localhost');
define('URL', '');    //THIS IS URL FOR DELETEADMIN.PHP
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food');


    $conn = mysqli_connect('localhost', 'root','') or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn, 'food') or die(mysqli_error()); //selecting DB



?>