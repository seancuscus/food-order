<?php include('partials/menu.php');  ?>

<div class="main-content">

    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /><br />

                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

               <br /><br />

               <?php 
               
               if(isset($_SESSION['add']))
               {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
               }

               if(isset($_SESSION['delete']))
               {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
               }

               if(isset($_SESSION['upload']))
               {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
               }

               if(isset($_SESSION['unauthorised']))
               {
                    echo $_SESSION['unauthorised'];
                    unset($_SESSION['unauthorised']);
               }

               if(isset($_SESSION['update']))
               {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
               }
               



               ?>

               <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //SQL Query
                        $sql = "SELECT * FROM tbl_food";

                        //Execute
                        $res = mysqli_query($conn, $sql);

                        //Row counting
                        $count = mysqli_num_rows($res);

                        $sn=1;
                        
                        if($count>0)
                        {
                            //food added to database
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                        <td><?php echo $sn++; ?>.</td>
                                        <td><?php echo $title; ?></td>
                                        <td>$<?php echo $price; ?></td>
                                        <td>
                                            <?php 
                                                //check if we have an image
                                                if($image_name=="")
                                                {
                                                    //error msg
                                                    echo "<div class='error'>Image Not Found</div>";
                                                }
                                                else
                                                {
                                                    //display image
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                                                    <?php
                                                }

                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                                        </td>
                                </tr>  

                                <?php
                            }
                        }
                        else
                        {
                            //food failed to add to database
                            echo "<tr> <td colspan='7' class='error'> Food Not Added </td> </tr>";
                        }
                    ?>




               </table>

    </div>

</div>

<?php include('partials/footer.php'); ?>