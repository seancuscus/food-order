<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password"placeholder="Confirm Password"> 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value ="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>
</div>

<?php 

        //check if the submit button is clicked
        if(isset($_POST['SUBMIT']))
        {
            //echo "CLICKED";

            //get the data from form
            $id_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //check if the user actually exists or not
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            //execute query
            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                //check if data exists
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //user exists new password can be changed
                    //echo "User Found";
                    //check if the new password matches or not
                    if($new_password==$confirm_password)
                    {
                        //update the password
                        //echo "password Match";
                        $sql2 = "UPDATE tbl_admin SET
                            password='$new_password' 
                            WHERE id=$id
                        ";

                        //execute query
                        $res2 = mysqli_query($conn, $sql2);

                        //check if the query executed
                        if($res2==true)
                        {
                            //display message
                            //redirect to admin page
                            $_SESSION['change-password'] = "<div class='success'>Password Change Success </div>";
                            //redirect user to homepage
                            header('location'.SITEURL.'admin/manage-admin.php');
                        }
                        else
                        {
                            //display error
                            //redirect to admin page
                            $_SESSION['change-password'] = "<div class='error'>Failed to change password </div>";
                            //redirect user to homepage
                            header('location'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else
                    {
                        //redirect to admin page
                        $_SESSION['password-doesnt-match'] = "<div class='error'>Password does not match </div>";
                        //redirect user to homepage
                        header('location'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //user does not exist
                    $_SESSION['user-not-found'] = "<div class='error'>User not found </div>";
                    //redirect user to homepage
                    header('location'.SITEURL.'admin/manage-admin.php');
                }
            }

            //check if the new passwords match

            //change password if everything is true
        }

?>



<?php include('partials/footer.php'); ?>