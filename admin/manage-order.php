<?php include('partials/menu.php');  ?>

<div class="main-content">

    <div class="wrapper">
        <h1>Manage Order</h1>


               <br /><br />

               <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
               ?>
               <br><br>

               <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Satus</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC" ;
                        
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn = 1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];

                                ?>

                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $food; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $order_date; ?></td>

                                            <td>
                                                <?php  
                                                    //Ordered, Your Food Is On The Way, Arrived, Cancelled
                                                    if($status=="Ordered")
                                                    {
                                                        echo "<label>$status</label>";
                                                    }
                                                    elseif($status=="Your Food Is On The Way")
                                                    {
                                                        echo "<label style='color: orange;'>$status</label>";
                                                    }
                                                    elseif($status=="Arrived")
                                                    {
                                                        echo "<label style='color: green;'>$status</label>";
                                                    }
                                                    elseif($status=="Cancelled")
                                                    {
                                                        echo "<label style='color: red;'>$status</label>";
                                                    }
                                                ?>
                                            </td>

                                            <td><?php echo $customer_name; ?></td>
                                            <td><?php echo $customer_contact; ?></td>
                                            <td><?php echo $customer_email; ?></td>
                                            <td><?php echo $customer_address; ?></td>
                                            
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                                
                                            </td>
                                        </tr>

                                <?php

                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>Orders Unavailable</td></tr>";
                        }
                    ?>



                
                    </tr>

               </table>

    </div>

</div>

<?php include('partials/footer.php'); ?>