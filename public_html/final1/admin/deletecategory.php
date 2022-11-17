<?php include('../config/constants.php');

    //echo "test";
    //check id and image_name value is set or not
    if(isset($_GET['id'])  AND isset($_GET['image_name']))
    {
        // value and delete script
       $id = $_GET['id'];
       $image_name = $_GET['image_name'];

       //remove image file
        if($image_name != "")
        {
            $path = "../images/".$image_name;     //I FIX IT IT IS../IMAGES/ directory ISSUE!  -------------------------------------------------------------------------------------
            //remove image
            $remove = unlink($path);

            if($remove==false)
            {
                //session message
                $_SESSION['remove'] = "<div class='error'> Fail to remove, try again.</div>";
                //redirect to manage
                header('location:'.URL.'admin/manage-category.php');
                //stop continue
                die();
            }
        }

       //delete data from DB and get SQL query to delete to DB
        $sql = "DELETE FROM tb_category WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check whether the data is delete from database or not
        if($res==true)
        {
            //success redirect here
            $_SESSION['delete'] = "<div class='win'>Delete Success</div>";
            //redirect to manage.category.php
            header('location:'.URL.'admin/manage-category.php');
        }
    else
    {   
        //success redirect here
        $_SESSION['delete'] = "<div class='win'>Delete Fail</div>";
        //redirect to manage-category.php
        header('location:'.URL.'admin/manage-category.php');
    }
    }

?>