<?php include('../config/constants.php');


if(isset($_GET['id']) && isset($_GET['image_name']))   //AND or &&
{
    //delete 
    //echo"delete";
    // target ID and image_name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //2.remove the image if available
    //check image if available or not and delete if available
    if($image_name !=="")
    {
        // image to remove from folder
        //get image_path
        $path = "../images/".$image_name;   

        //remove image file in folder
        $remove = unlink($path);

        //check image fail or no
        if($remove==false)
        {
            $_SESSION['upload'] = "<div class='error'> Fail to remove, try again.</div>";
                //redirect to manage
                header('location:'.URL.'admin/manage-recipe.php');
                die();
        }

    }

    // Delete food from DB
    $sql ="DELETE FROM tb_recipe WHERE id=$id";
    //execute query
    $res = mysqli_query($conn, $sql);

     //execute query
     if($res==true)
    {
        $_SESSION['delete'] = ""
    }






}
else 
{
    //redirect to manage-recipe.php
    //echo "redirect";
    $_SESSION['delete'] = "<div class='win'> Delete fail. </div>";
    header('location:'.URL.'admin/manage-recipe.php');
}




?>