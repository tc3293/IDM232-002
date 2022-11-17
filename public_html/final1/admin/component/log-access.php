<?php
        //Access control
        //check user log out or in
    if(!isset($_SESSION['user']))
    {
        //user not log in
        //redirect to login page 
        $_SESSION['no-login-message'] = "<div class='error'> You need to Log in to access admin settings.</div>";
        //redirect to login page
        header('location: http://localhost/final1/admin/log-in.php');
    }

?>