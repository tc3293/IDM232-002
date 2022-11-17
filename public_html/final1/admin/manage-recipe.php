<?php include('component/header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Setting Recipe</h1>

        <br> <br> <br>
        <!---button ADD ADMIN--->
        <a href="<?php echo URL; ?>admin/add-recipe.php" class="btn-primary">Add Recipe</a>
        <br> <br> <br>


        <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
        ?>


        <table class=tbl-full>
            <tr> 
                <th>List</th>
                <th>Title</th>
                <th>Image</th>
                <th>Feature</th>
                <th>Active</th>
                <th>Settings</th>
            </tr>

            <?php
            //make SQL QUERY TO GET ALL recipe
            $sql = "SELECT * FROM tb_recipe";

            //execute query
            $res = mysqli_query($conn, $sql);

            //count Rows to checks whether we have foods or not
            $count = mysqli_num_rows($res);

                //serial num varable
                $list=1;

            
            if($count>0)
            {
                //We have food in DB
                //Get the foods from DB and Display
                while($row = mysqli_fetch_assoc($res))
                {
                    //get values from individual colums
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>

                    <tr>

                        <td><?php echo $list++; ?></td>
                        <td><?php echo $title; ?></td>

                        <td>
                        <?php 
                            //check image
                            if($image_name=="")
                            {
                                //we do not have image, display error message
                                echo "<div class='error'>Not add.</div>";
                            } 
                            else
                            {
                                //image found
                                ?>
                                <img src="<?php echo URL; ?>images/<?php echo $image_name; ?>"width="130px">
                                <?php
                            }
                            ?>
                        </td>
                      
                        </td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo URL; ?>admin/edit-recipe.php?id=<?php echo $id;?>" class="btn-edit">Edit</a>
                            <a href="<?php echo URL; ?>admin/delete-recipe.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                    
                    <?php
                }
            }

            else
            {   
                //recipe fail to add
                echo "<tr> <td colspan='7' class='error'> Recipe not add. </td> </tr>";
            }


            ?>

            

        </table>
    </div>
</div>


<?php include('component/footer.php') ?>