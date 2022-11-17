<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>
            Log-in - Admin System
        </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

<body> 

<div class="log">
    <h1 class="center">Admin Log-In</h1>
    <br>

    <?php 
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
?>
<br><br>

    <form action="" method = "POST" class="center">
        Username:
        <input type="text" name="username" placeholder="Enter Username">
        Password:
        <input type="password" name="password" placeholder="Enter Password">

        <input type="submit" name="submit" value="Login" class="btn-primary">

    </form>
<br>

    <!-- end line-->

    <p class="center">Log-In to edit & delete admin system</p>
    <br>
</div>
</body>
</html>

<?php
    //varible submit checker here
    if(isset($_POST['submit']))
    {
        //enter log in 
        //data from log in form and echo in front $username or $password to check work or not
       $username = $_POST['username'];
       $password = md5($_POST['password']);

       //SQL check user with username and password exist
       $sql = "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";

       //execute sql here
       $res = mysqli_query($conn, $sql);

       //count rows to check exist user
       $count = mysqli_num_rows($res);

       if($count==1)
       {
        //available
        $_SESSION['login'] = "<div class='win'> Log-in Sucess</div>";
        $_SESSION['user'] = $username; //check user logged out or in


        //redirect to index.php
        header('location: http://localhost/final1/admin/index.php');    //header('location:' .URL. 'index.php/');
       }
     else
     {
    // not available or login in failed
    $_SESSION['login'] = "<div class='error center'> Account Not Match, try again.</div>";
    //redirect to index.php
    header('location: http://localhost/final1/admin/log-in.php');
    }

}

?>