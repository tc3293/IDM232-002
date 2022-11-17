<?php include('component/header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Setting Category</h1>

        <br> <br> <br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if(isset($_SESSION['failed-remove']))
        {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }

        ?>

        <br> <br>


        <!---button ADD ADMIN--->
        <a href="<?php echo URL; ?>admin/add-category.php " class="btn-primary">Add Category</a>
        <br> <br> <br>
        
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

        //QUERY GET CATAGORY TO DB
        $sql = "SELECT * FROM tb_category";

        //EXECUTE QUERY
        $res = mysqli_query($conn, $sql);

        //count rows
        $count = mysqli_num_rows($res);

        /////////////////// Serial number variable 1), 2), 3) ex.
        $list=1;

        //data checker in db or no
        if($count>0)
        {
            //have data in db and get data and display here
            while($row=mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $feature = $row['feature'];
                $active =$row['active'];

                ?>
                
                <tr>
                <td><?php echo $list++; ?></td>
                <td><?php echo $title; ?></td>

                <td>
                    <?php
                    //check image available


                    if($image_name!="")
                    {
                        //display image
                        ?>  
                        <img src="<?php echo URL; ?>images/<?php echo $image_name; ?> " width="100px" >          <!----- URL DIRECTION ISSUE FOR IMAGE HERE FIX THIS OMG I FIX IT IS images/-->

                        <?php
                    }
                    else
                    {
                        //display 
                        echo "<div class='error'>Image not add.</div>";
                    }
                    ?>

                </td>
                
                <td><?php echo $feature;?></td>
                <td><?php echo $active;?></td>
                <td>
                    <a href="<?php echo URL; ?>admin/edit-category.php?id=<?php echo $id;?>" class="btn-edit">Edit</a>
                    <a href="<?php echo URL; ?>admin/deletecategory.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete</a>
                  
                    
                </td>
            </tr>


                <?php
            }

        }
        else{
            //cant find data in db
            ?>
            
            <tr>
                <td><div class="error">Didn't Success Added</div></td>
            </tr>

            <?php
        }
        ?>
    

        </table>
    </div>
</div>



<?php include('component/footer.php') ?>