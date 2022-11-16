<?php include('component/header.php'); ?>

<div class= "main-content">
    <div class = "wrapper">
        <h1>Edit Admin</h1>

        <br> <br>

        <?php
            //get id of selected admin
            $id=$_GET['id'];

            //SQL QUERY get info
            $sql="SELECT * FROM tb_admin WHERE id=$id";

            //execute query
            $res=mysqli_query($conn, $sql);

            //execute query checker test
            if($res==true)
            {
                //check
                $count = mysqli_num_rows($res);
                // check admin data available
                if($count==1)
                {
                    //get the details
                    //echo "Edit Here:";
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
            }
            else 
            {
                //redirect to index.php
                header('location: http://localhost/final1/admin/index.php');
            }


        ?>  

        <form action="" method="POST">

            <table class="tbl-10">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                <td col="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Edit Update" class="btn-edit">
                </td>
            </tr>

            </table>
        </form>

    </div>
</div>

<?php

    //check whether the submit button work
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //target value from edit
        $id= $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //SQL Query to Edit
        $sql = "UPDATE tb_admin SET
        full_name ='$full_name',
        username = '$username'
        WHERE id='$id'
        ";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //check execute work or not
        if($res==true)
        {
            //query execute
            $_SESSION['edit'] = "<div class='win'>Edit Success.</div>";
            //redirect index page
            header('location: http://localhost/final1/admin/index.php');
        }
        else
        {
            //fail execute
            $_SESSION['edit'] = "<div class='error'>Edit Failed.</div>";
            //redirect 
            header('location: http://localhost/final1/admin/index.php');
        }
    }
?>

<?php include('component/footer.php'); ?>