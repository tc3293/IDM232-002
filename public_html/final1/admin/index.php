<?php include('component/header.php') ?>

    <!---main here-->
    <div class="main-content">
    <div class="wrapper">
        <h1>Setting Admin</h1>
  <br><br>
        
        <?php 
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

?>
        <br> <br> <br>

    
        <!---button ADD ADMIN--->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        
        <br> <br> <br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //display  message
                unset($_SESSION['add']); //remove message
            }

            if(isset($_SESSION['delete']))
            {

                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['edit']))
            {
                echo $_SESSION['edit'];
                unset($_SESSION['edit']);
            }
        ?>

        <br> <br>

        <table class=tbl-full>
            <tr> 
                <th>List</th>
                <th>Full_Name</th>
                <th>Username</th>
                <th>Settings</th>
            </tr>

            <?php
            //query to get admin
            $sql = "SELECT * FROM tb_admin";
            //execute the query
            $res = mysqli_query($conn, $sql);


            //check if is executed or fail
            if($res==TRUE)
            {
                //check count rows fail or success
                $count = mysqli_num_rows($res); //function of row for DB

                $list=1; //variable to assign value

                //check num of rows
                if($count>0)
                {
                    //found data in DB
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //using while loop get data from DB
                        //while loop run as long as we have data in DB

                        //invidivdual data
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];

                        //display value in table
                        ?>
<?php
    $link_delete = "admin/deleteadmin.php";                   


    /// href="<?php echo URL; edit-admin.php?id=<?php echo $id; " class="btn-edit">Edit</a>  <a href="<?php echo URL;deleteadmin.php?id=<?php echo $id; " class="btn-delete">Delete</a>  
?>
                        <tr> 
                            <td><?php echo $list++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo URL;?>admin/edit-admin.php?id=<?php echo $id; ?>" class="btn-edit">Edit</a>       <!--IMPORTANT BUTTON URL FOR SITE LINK  DONT FORGOT admin/edit-admin.php! -->
                                <a href="<?php echo URL;?>admin/deleteadmin.php?id=<?php echo $id; ?>" class="btn-delete">Delete</a>  <!--IMPORTANT BUTTON URL FOR DELETE -->
                             
                            </td>
                        </tr>

                        <?php
                    }
                }
                else
                {
                    //not found data in DB
                }

            }
            ?>

        </table>
    </div>
</div>

<?php include('component/footer.php') ?>
