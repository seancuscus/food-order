<?php 

include('../config/constants.php');
include('login-check.php');

?>




<html> 
    <head>
        <title>Restaurant Order Backend - Home Page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body> 

    <div class="logobackend">
                <a href="#" title="Logo">
                    <img src="../images/logotwo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

        <!-- menu section starts -->
        <div class="menu text-center">
            <div class="wrapper">
               <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li> 
                    <li><a href="logout.php">Logout</a></li>
               </ul>
            </div>
            
        </div>
        <!-- menu section ends -->