<?php
    include('../config/constants.php');
    //eliminate session
    session_destroy();
    
    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
?>
