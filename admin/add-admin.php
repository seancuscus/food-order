<?php include('partials/menu.php'); ?>

<div class="main-content"> 
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br> <br>

        <?php 
            if(isset($_SESSION['add'])) //checking if the session is set
            {
                echo $_SESSION['add']; //dispalying message
                unset($_SESSION['add']); //remove message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name = "submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
    //process the value from form and save it in the database 

    //check whether the button is clicked or not
    
    if(isset($_POST['submit']))
    {
            //Button clicked
            //echo "button clicked";

            //use echo to test

            //Part 1. get the data from form
           $full_name = $_POST['full_name'];
           $username = $_POST['username'];
           $password = md5($_POST['password']); //Password Encryption eith MD5

           
           $sql = "INSERT INTO tbl_admin SET
                full_name='$full_name',
                username='$username',
                password='$password'
           ";

           

            
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            
            if($res==TRUE)
            {
                
                //echo "data works";
                
                $_SESSION['add'] = "Admin Added Successfully";
                //redirect page to manage admin
                header("location:".SITEURL.'admin/manage-admin.php');
            }
            else
            {
                //failed
                //echo "failed";
                //display message
                $_SESSION['add'] = "Failed to add admin";
                //redirect 
                header("location:".SITEURL.'admin/add-admin.php');
            }

    }

?>