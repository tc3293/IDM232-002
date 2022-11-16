<?php

        //include constants.php here
        include('../config/constants.php');

        //get admin id first for delete
        $id = $_GET['id'];
    
        //SQL Query to delete admin button
        $sql = "DELETE FROM tb_admin WHERE id=$id";
    
        //execute the query here
        $res = mysqli_query($conn, $sql);
    
    
        //check query execute
        if($res==true)
        {
            //query execute success
            //echo "Admin Delete";
            //session variable display message here
            $_SESSION['delete'] = "<div class='win'> Delete Success. </div>";
            //redirection to index.php
            header('location: http://localhost/final1/admin/index.php');
        }
        else
        {
            //failed execute
            //echo "Admin failed delete";
            $_SESSION['delete'] = "<div class='error'> Delete Failed, try again. </div>";
            //redirection to index.php
            header('location: http://localhost/final1/admin/index.php');

        }
    
        //redirect to admin index page
    
    
    

?>


