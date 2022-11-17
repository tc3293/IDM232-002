<?php

    include('../config/constants.php');
    // session when log out
    session_destroy(); //unsets $_session['user']


    
    //redirect page to user home page
    header('location:' .URL.'index.php');

?>