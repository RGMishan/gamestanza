<?php include"includes/admin_header.php"; ?>
      
<!--DELETE PRODUCT-->
<?php 

    if(isset($_GET['delete_id'])){
        $product_del_id = $_GET['delete_id'];
        
        $query = "DELETE FROM product WHERE p_id = {$product_del_id}";
        $del_query = mysqli_query($connection,$query);
        confirm($del_query);
        header("Location: viewAllProducts.php");
    }

?>
<!--DELETE PRODUCT END-->
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>ORDER REPORT</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns form">
                <table>
                    <tbody>
                        <?php
                    if(isset($_GET['o_id'])){
                        $o_id = $_GET['o_id'];
                        $query = "SELECT * FROM orders where o_id=$o_id";
                        $get_all_orders = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($get_all_orders)){
                            $cust_id = $row['cust_id'];
                            $p_cat = $row['cat_id'];
                            $p_name = $row['p_name'];


                            $date = $row['date'];

                            $net_price = $row['net_price'];
                            $payment_mode = $row['payment_mode'];

                            $query = "SELECT * FROM customer WHERE c_id = {$cust_id}";
                            $get_username = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($get_username)){
                                $cust_fname = $row['first_name'];
                                $cust_lname = $row['last_name'];
                                $ship_add = $row['c_address'];
                                $c_mobile = $row['c_mobile'];
                                $city = $row['c_city'];
                                $state = $row['c_state'];
                                $pincode = $row['c_pincode'];
                            }

                            echo "<tr>";
                                echo "<td><strong>Name:</strong></td>"; 
                                echo "<td> $cust_fname $cust_lname</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td><strong>Mobile No.:</strong></td>"; 
                                echo "<td> $c_mobile</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td><strong>Shipping Address:</strong></td>"; 
                                echo "<td> $ship_add, $city, $state - $pincode</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td style='border-bottom: 1px solid black'><strong>Payment Mode:</strong></td>"; 
                                echo "<td style='border-bottom: 1px solid black'> $payment_mode</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td colspan='2' style='text-align: left; color:red'><strong>ORDER SUMMARY</strong></td>";
                            echo "</tr>";
                            
                            echo "<tr>";
                                echo "<td><strong>Product Name</strong></td>"; 
                                echo "<td><strong>Quantity</strong></td>";
                            echo "</tr>";
                        }
                    }
                            ?>
                        </tbody>
                    </table>
                    
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>
   

   