<?php 

    //include constants.php file
    include('../config/constants.php');

    // get the ID of admin
    $id = $_GET['id'];


    // create SQL query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn, $sql);

    //check if the query executed successfully 
    if($res==true)
    {
        //query executed successfully 
        //echo "admin deleted";
        //create session vairable to display message
        $_SESSION['delete'] = "<div class ='success'>Admin Deleted Successfully</div>";
        //redirect to manage admin page
        header('location:'. SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //query failed
        //echo "failed to delete";

        $_SESSION['delete'] = "<div class ='error'>Admin Deletion Failed, Try Again</div>";
        header('location:'. SITEURL.'admin/manage-admin.php' );
    }

    // redirect to manage admin page 



?>