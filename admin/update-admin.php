<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php 
        
            // Get the ID of selected admin
            $id=$_GET['id'];

            // Create SQL query for admin details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //execute the query
            $res=mysqli_query($conn, $sql);

            //Test if the query is executed 
            if($res==true)
            {
                //check if the data is available 
                $count = mysqli_num_rows($res);
                
                //check if we have admin data
                if($count==1)
                {
                    //Get the details
                    //echo "admin available";
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //redirect to admin page
                    header('location'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>

        <form action="" method="POST">

            <table class ="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2"> 
                        <input type="hidden" name="id" value = "<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary"> 
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 

    //check if the submit button has been clicked
    if(isset($_POST['submit']))
            {
                //echo "button clicked";
                //Get all the values from the form
                $id = $_POST['id'];
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];

                //create sql query to update the admin user
                $sql = "UPDATE tbl_admin SET
                full_name = '$full_name' ,
                username = '$username' 
                WHERE id='$id'
                ";

                //execute
                $res = mysqli_query($conn, $sql);

                //check if the qqurey has been executed
                if($res==true)
                {
                    //query executed and admin updated
                    $_SESSION['update'] = "<div class='success'>admin updated successfully.</div>";
                    //redirect to admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else
                {
                    //failed to update admin
                    $_SESSION['update'] = "<div class='error'>admin failed to update.</div>";
                    //redirect to admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

?>


<?php include('partials/footer.php'); ?>