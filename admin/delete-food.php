<?php 

    include('../config/constants.php');

    //echo "AM I WORKING? or am i going insane??? :)";

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
       // echo "delete";

       //Get the image name
       $id = $_GET['id'];
       $image_name = $_GET['image_name'];


       //Remove Image
       if($image_name != "")
       {
            $path = "../images/food/".$image_name;

            $remove = unlink($path);
            if($remove==false)
            {
                //image removal failed
                $_SESSION['upload'] = "<div class='error'>Failed To Remove File</div>";
                //redirect
                header('location:'.SITEURL.'admin/manage-food.php');

                die();
            }
       }

       //Delete Food from database
       $sql = "DELETE FROM tbl_food WHERE id=$id";
       //execute query
       $res = mysqli_query($conn, $sql);

       //check if query was successful
       //Redirect
       if($res==true)
       {
            //delete
            $_SESSION['delete'] = "<div class='success'>Food Deleted!</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
       }
       else
       {
            //delete failed
            $_SESSION['delete'] = "<div class='error'>Failed to Delete</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
       }

       
    }
    else
    {
        //redirect
        //echo "redirect";
        $_SESSION['unauthorised'] = "<div class='error'>Unauthorized Access</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }


?>