<?php include('component/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Edit Category</h1>


    <?php
        //check id is set or not
        if(isset($_GET['id']))
        {
            //get id and other detail
            //echo"getting data";
            $id =$_GET['id'];
            //SQL QUERY GET ALL DATA
            $sql = "SELECT *FROM tb_category WHERE id=$id";

            //execute query
            $res = mysqli_query($conn, $sql);

            //count row to check id valid
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                //get all data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $feature = $row['feature'];
                $active = $row['active'];
            }
            else
            {
                //redirect to manage-category.php
                $_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
                header('location:' .URL. 'admin/manage-category.php');
            }
        }

        else{

            //redirect to manage-category
            header('location:' .URL. 'admin/manage-category.php');
        }

?>


        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-10">
        <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">
                    </td>
                </tr>

        
            <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image != "")
                            {
                                //display image
                                ?>
                                <img src="<?php echo URL;?>images/<?php echo $current_image ?>" width="200px">
                                <?php

                            }
                            else {
                                //display message
                                echo "<div class='error'>No Image</div>";
                            }
                        ?>
                    </td>
                </tr>


    
                <tr> 
                    <td>Feature (Display off/on on homepage?): </td>
                    <td>
                        <input <?php if($feature=="Yes"){echo "checked";} ?> type="radio" name="feature" value="Yes"> Yes

                        <input <?php if($feature=="No"){echo "checked";} ?> type="radio" name="feature" value="No"> No
</td>
                </tr>

                <tr>
                    <td>Active (Shown on home page?):</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes

                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
</td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>
                    <input type="hidden" name="$current_image" value="<?php echo $current_image; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Confirm" class="btn-edit">
                    </td>
                
                </tr>

        </table>
        </form>

        <?php

        if(isset($_POST['submit']))
        {
            //echo "clicked";
            //collect value from form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $feature = $_POST['feature'];
            $active = $_POST['active'];

            // Updaing new image here
            //check image work here
            if(isset($_FILES['image']['name']))
            {
                //get image detail
                $image_name = $_FILES['image']['name'];

                //check image available here
                if($image_name != "")
                {
                    //Image available
                    // 1. Upload the new image
                    
                     //rename image name here below
                        //extension image (jpg and png)
                        $ext = end(explode('.', $image_name));

                        //rename image
                        $image_name = "Category".rand(000, 999).'.'.$ext;
                        
                    

                        //this is where image will save in the folder script
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/".$image_name;
                        
                        //upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);    ///COME BACK FIX THIS IMAGE ISSUEE HEREEEEEEEEEEEEeeeeeeeeeeeeeeeeeeeeeeeeeeeeEEEEEEEEEE

                        //check image is upload here
                        //if not work, is wil lstop and redirect with error text
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "div class='error'>Upload failed. </div>";
                            //redirect to add-category.php
                            header('location:' .URL.'admin/manage-category.php');
                            //stop working here
                            die();
                        }

                    //remove current image if available 
                        if($current_image!="")
                        {
                            $remove_path = "../images/".$current_image;

                            $remove = unlink($remove_path);

                            //check image remove here if fal then display message
                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Fail to remove image.</div>";
                                header('location:' .URL.'admin/manage-category.php');
                                die();
                            }
                        }
                            

                }
                else{
                    $image_name = $current_image;
                }
            }
            else
            {
                $image_name = $current_image;

            }




            //update DB MAKE sql2 because risky that already have sql at top page
            $sql2 = "UPDATE tb_category SET
                title = '$title',
                image_name = '$image_name', 
                feature = '$feature',
                active = '$active'
                WHERE id=$id 
            ";

            //execute query
            $res2 = mysqli_query($conn, $sql2);

            //redirect page to manage-category.php
            //check if is work execute or no
            if($res2==true)
            {
                //category updated edit
                $_SESSION['update'] = "<div class='win'>Edit Success.</div>";
                header('location:' .URL.'admin/manage-category.php');
            }
            else
            {
                //failed to edit
                $_SESSION['update'] = "<div class='error'>Edit fail.</div>";
                header('location:' .URL.'admin/manage-category.php');
            }

        }


        ?>

    </div>
</div>







<?php include('component/footer.php'); ?>