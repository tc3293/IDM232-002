<?php include('component/header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>
        <?php 
            if(isset($_SESSION['add'])) //checking if session is set or not
            {
                echo $_SESSION['add']; //display message if set
                unset($_SESSION['add']);// remove message

            }

        ?>



        <form action="" method="POST">

            <table class="tbl-10">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="text" name="password" placeholder="Enter Password"></td>
                </tr>


            <tr>
                <td col="2">
                    <input type="submit" name="submit" value="Submit" class="btn-edit">
                </td>
            </tr>


            </table>
        </form>
    </div>
</div>


<?php include('component/footer.php') ?>

<?php 
    //Process value form  and save in DB
    //Check submit button working or not

    if(isset($_POST['submit']))
    {
    //get data form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //make password encryption with md5

    //2. SQL QUERY TO SAVE DATA TO DB
    $sql = "INSERT INTO tb_admin SET
        full_name = '$full_name',
        username ='$username',
        password ='$password'
    ";
    
    //3. EXECUTE QUERY AND SAVE DATA INTO DB
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. DB CHECK IF IS INSERYT OR NOT WHEN QUERY IS EXECUTED
    if($res==TRUE)
    {
        //DATA INSERT
        //echo "DATA INSERT";
        //create session variable to display message
        $_SESSION['add'] = "Add Successful";
        //redirect page index admin page
        header("location: http://localhost/final1/admin/");
    }
    else
    {
        //FAILED
        //echo "failed";
        $_SESSION['add'] = "Add Failed, try again";
        //redirect page admin add page
        header("location: http://localhost/final1/admin/add-admin.php");
    }


    }



?>