<?php include('partials/menu.php'); ?>

<div class ="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        
        <br><br>

        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br><br>

        <!-- category form starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
        <!-- category form ends -->

        <?php 
        
            //check if submit button is pressed
            if(isset($_POST['submit']))
            {
                //echo "clicked";

                //retrieve value
                $title = $_POST['title'];

                //check if radio button is selected
                if(isset($_POST['featured']))
                {
                    //retrieve value 
                    $featured = $_POST['featured'];
                }
                else
                {
                    //default value
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }



                //check if the image is selected; set values
                //print_r($_FILES['image']);

                //die();

                if(isset($_FILES['image']['name']))
                {
                    //upload the image
                    $image_name = $_FILES['image']['name'];

                    //upload image if image has been selected
                    if($image_name != "")
                    {

                    

                    //rename image
                    $ext = end(explode('.', $image_name));

                    $image_name = "Food_Category_".rand(000, 999).'.'.$ext; //changes image name to food_category_(number)


                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check if image is uploaded
                    if($upload==false)
                    {
                        $_SESSION['UPLOAD'] = "<div class='error'>Failed to upload image</div>";
                        //redirect
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }

                    }    
                }
                else
                {
                    //dont upload image
                    $image_name="";
                }

                //SQL query 
                $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";

                //execute query and save
                $res = mysqli_query($conn, $sql);

                // check if the query worked
                if($res==true)
                {
                    //Query executed
                    $_SESSION['add'] = "<div class='success'>Category Added</div>";
                    //redirect
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //query failed
                    $_SESSION['add'] = "<div class='error'>Category Failed To Add</div>";
                    //redirect
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        
        ?>


    </div>
</div>   

<?php include('partials/footer.php'); ?>