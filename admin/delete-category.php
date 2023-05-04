<?php 
    //echo "delete page";
    include('../config/constants.php');

    //check the id and image_name
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //delete
        //echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove image file
        if($image_name != "")
        {
            $path = "../images/category/".$image_name;
            $remove = unlink($path);

            //if failed to remove respond with error msg and stop
            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed To Remove Image </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }

        }

        //delete from database
        //sql query to delete data
        $sql = "DELETE FROM tbl_category WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check if the data has been deleted
        if($res==true)
        {
            //success msg
            $_SESSION['delete'] = "<div class='success'>Category Deleted</div>";
            //redirect
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //error msg + redirect
            $_SESSION['delete'] = "<div class='error'>Category Failed To Delete</div>";
            //redirect
            header('location:'.SITEURL.'admin/manage-category.php');
        }

        
    }
    else
    {
        //redirect
        header('location:'.SITEURL.'admin/manage-category.php');
    }


?>