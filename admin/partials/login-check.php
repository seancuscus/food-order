<?php 

    
    //check if user is logged in
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Login to access admin panel</div>";
        header('location'.SITEURL.'admin/login.php');
    }

?>