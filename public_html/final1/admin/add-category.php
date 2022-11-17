<?php include('component/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }


        ?>

<br> <br>

        <!--form here-->
        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tb-10">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="Category Title">
</td>

            </tr>

            <tr>
                <td>Feature (Display off/on on homepage?):</td> <!--feature datebase mean is will displayed on home page, if no won’t display on home page but will be on category page-->
                <td>
                    <input type="radio" name="feature" value="Yes"> Yes
                    <input type="radio" name="feature" value="No"> No
</td>
            </tr>

            <tr>
                <td>Active (Shown on home page?): </td>    <!--active datebase mean to be shown on home page (yes or no)-->
                <td>
                    <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
</td>
            </tr>

            <tr>
            <td>Upload Image:</td>
            <td>
                <input type="file" name="image">
            </td>

        </tr>




            <tr>
                <td col="2">
                    <input type="submit" name="submit" value="Add" class="btn-edit">
                </td>
            </tr>



        </table>

        </form>
    
        <?php
        //data checker 
        if(isset($_POST['submit']))
        {
            //echo "click";

            //collect value store
            $title = $_POST['title'];

            //radio checker if work
            if(isset($_POST['feature']))
            {
                //value form
                $feature = $_POST['feature'];
            }
            else
            {
                //set default value
                $feature = "No";
            }

            if(isset($_POST['active']))
            {
                $active =$_POST['active'];
            }
            else 
            {
                $active = "No";
            }
    



            //check image select here
            //print_r($_FILES['image']);

            //die(); //code break
//THIS IS IMAGE UPLOAD AND STORAGE DB AND SAVE IMAGE IN FOLDIER IDM232/FINAL1/IMAGES
            if(isset($_FILES['image']['name']))
            {
                //imager upload
                //upload image beed source path
                $image_name = $_FILES['image']['name'];

                
                    //upload the image if image select script here
                    if($image_name != "")
                    {

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
                            header('location:' .URL.'admin/add-category.php');
                            //stop working here
                            die();
                        }

                    }
            }   
            else{
                //image cant upload
                $image_name="";
            }
            



            //SQL query to insert catagory into DB here
            $sql = "INSERT INTO tb_category SET
            title='$title',
            image_name='$image_name',
            feature='$feature',
            active='$active'
            ";

            //3. Execute the Query and save in DB
            $res = mysqli_query($conn, $sql);

            //check is add query when execute
            if($res==true)
            {
                //query execute add
                $_SESSION['add'] = "<div class='win'>Add Sucess</div>";
                //redirect to manage-category.php page
                header('location:' .URL. 'admin/manage-category.php');
            }
            else
            {
                //fail execute
                 $_SESSION['add'] = "<div class='error'>Add Failed</div>";
                 //redirect to manage-category.php page
                 header('location:' .URL. 'admin/add-category.php');
            }

        }

?>




</div>
</div>

<?php include('component/footer.php'); ?>