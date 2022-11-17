<?php include('component/header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Recipe</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>




        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-10">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Name of the Recipe Here">
                    </td>
                </tr>



                <tr>
                    <td>Ingredient/Instruction:</td>
                    <td>
                        <textarea name="description" cols="100" rows="10" placeholder="Description of the Recipe."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php
                                //create php code to display category from DB
                                //SQL HERE to active categories
                                $sql = "SELECT * FROM tb_category WHERE active='Yes'";



                                //execute query
                                $res = mysqli_query($conn, $sql);

                                //check count rows category work or no
                                $count = mysqli_num_rows($res);

                                //Count greater than 0 then category else dont have it
                                if($count>0)
                                {
                                    //We have category
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get info of category
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        
                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php

                                    }
                                }
                                else
                                {
                                    //we dont have it
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }

                                //display dropdown

                            ?>

                        </select>
                    </td>


                    <tr>
                        <td>Feature (Display off/on on homepage?):</td>
                        <td>
                            <input type="radio" name="feature" value="Yes"> Yes
                            <input type="radio" name="feature" value="No"> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active (Shown on home page?):</td>
                    <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                    </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Recipe" class="btn-edit">
                        </td>
                    </tr>

                </tr>
            </table>

        </form>

        <?php
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        
    //Check button work
        if(isset($_POST['submit']))
        {
            //add recipe in DB
            //echo "click test";   

            //collect data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            
            //if issett check radio button work or not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else {
                $featured = "No"; //default value
            }

            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else{
                $active = "No"; //default value
            }

            //2 Upload image select
            //check select image is clickable and upload image
            if(isset($_FILES['image']['name']))
            {
                //get the detail of select image
                $image_name = $_FILES['image']['name'];

                //image check if not upload
                if($image_name!= "")
                {
                    //image select
                    //rename image
                    //extension select png, jpg, more
                    $ext = explode('.', $image_name);
                        $ext = end($ext);   //Only variables should be passed by referenc

                    //name for image
                    $image_name = "Recipe-Name-".rand(0000,9999).".".$ext; //New image with Recipe-name-_____

                    //upload image


                    //path of srouce in currently location of image
                    $src = $_FILES['image']['tmp_name'];

                    //Destination path of image
                    $dst = "../images/" .$image_name;

                    //upload recipe image here
                    $upload = move_uploaded_file($src, $dst);

                    //check imag eupload or no
                    if($upload==false)
                    {
                        //fail upload
                        $_SESSION['upload'] = "<div class='error'>Upload Fail</div>";
                        header('location:' .URL.'admin/add-recipe.php');
                        //redirect to add-recipe.php
                        die();
                    }

                }

            }
            else
            {
                $image_name = ""; //default setting to empty
                
            }


            //insert data in DB

            //SQL QUERY to SAVE OR ADD RECIPE
    //--------------------------------------VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV below here I have issue that is not connect to DB even $sql2 and sql
   // $sql2 = "SELECT * FROM tb_recipe WHERE id='$id'";          category = '$category',             feature ='$feature',
            $sql2 = "INSERT INTO tb_recipe SET               
                title = '$title',
                description = '$description',
                image_name = '$image_name',
                category_id = '$category',
                featured =   '$featured',
                active =    '$active'
            ";
            
            //Execute query
            $res2 = mysqli_query($conn, $sql2);

            //check data work here
            //redirect with message to manage-recipe.php
            if($res2 == true)
            {
                //data success
                $_SESSION['add'] = "<div class='win'>Add Success.</div>";
                header('location:' .URL.'admin/manage-recipe.php');
            }
            else {
                //data fail
                $_SESSION['add'] = "<div class='error'>Add Fail.</div>";
                header('location:' .URL.'admin/manage-recipe.php');
            }
            

        }



    ?>




<?php include('component/footer.php') ?>