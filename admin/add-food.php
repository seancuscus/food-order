<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">


            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Food Name">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Food Description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">


                        <?php 
                            //sql query for active categories
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            
                            $res = mysqli_query($conn, $sql);

                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                //we have the categories
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id = $row['id'];
                                    $title = $row['title'];

                                    ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                    <?php
                                }
                            }
                            else
                            {
                                //no categories
                                ?>
                                <option value="0">No Categories Found</option>
                                <?php
                            }



                        ?>


                        </select>
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
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>


        </form>


        <?php 
        
            //check if the button has been clicked
            if(isset($_POST['submit']))
            {
                //add to database
                //echo "ARE YOU WORKING!?!?!?!?";

                //Get Data
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //Check if radio button is clicked
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
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

                //upload Image
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        //image selected
                        //rename
                        $image_info = explode (".", $image_name);
                        $ext = end ($image_info);

                        //new name 
                        $image_name = "Food-Name-".rand(0000,9999).".".$ext;

                        //upload
                        //get image path

                        $src = $_FILES['image']['tmp_name'];

                        $dst = "../images/food/".$image_name;

                        //upload image
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            //image upload failed
                            //redirect
                            $_SESSION['upload'] = "<div class='error'>Image Upload Failed</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            //stop process
                            die();
                        }
                    }

                }
                else
                {
                    $image_name = "";
                }

                //Insert iamge to Database

                //sql query
                //NOTE TO SELF------> numerical values arent in single quotes ('') but string values always are!!!!!!
                $sql2 = "INSERT INTO tbl_food SET
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                //execute query
                $res2 = mysqli_query($conn, $sql2);

                //Redirect
                if($res2 == true)
                {
                    //Success
                    $_SESSION['add'] = "<div class='success'>Food Added!</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //Failure
                    $_SESSION['add'] = "<div class='error'>Food Failed To Add</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

                
            }
            
        ?>


    </div>
</div>

<?php include('partials/footer.php')?>