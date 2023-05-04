<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- login form start -->
            <form action="" method="POST" class="text-center">
                <h4 class="text-center">Username:</h4> 
                <input type="text" name ="username" placeholder="Enter Username" ><br><br>
                
                <h4 class="text-center">Password:</h4> 
                <input type="password" name="password" placeholder="Enter Password"><br><br>

                <input type="submit" name="submit" value="Login" class="btn-primary">
                <br><br>
            </form>
            <!-- login form end -->

            <p class="text-center">Created By - <a href="https://www.linkedin.com/in/sean-m-95a7b412a/">Sean McNally</p>
        </div>

    <body>
        
    </body>

</html>

<?php 

//test if the submit button is clicked
if(isset($_POST['submit']))
    {
        
        //get the data
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // check if username and password exists
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute query
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user exists
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            $_SESSION['user'] = $username; //CHECKING IF THE USER IS LOGGED IN OR NOT
            //redirect to homepage
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //user doesnt exist
            $_SESSION['login'] = "<div class='error text-center'>Login Unsuccessful Check username or password</div>";
            //redirect to homepage
            header('location:'.SITEURL.'admin/login.php');
        }
    }

?>