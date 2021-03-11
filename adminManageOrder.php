<?php include"includes/admin_header.php"; ?>
      
<!--DELETE ORDER-->
<?php 

    /*if(isset($_GET['delete_id'])){
        $product_del_id = $_GET['delete_id'];
        
        $query = "DELETE FROM product WHERE p_id = {$product_del_id}";
        $del_query = mysqli_query($connection,$query);
        confirm($del_query);
        header("Location: viewAllProducts.php");
    }
*/
?>
<!--DELETE PRODUCT END-->
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>ALL ORDERS</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns form">
                <table>
                    <thead>
                        <tr>
                        <th>Order Id</th>
                        <th>Customer Username</th>
                        <th>Net. Price</th>
                        <th>Payment Mode</th>
                        <th>Status</th>
                        <th>View Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $query = "SELECT * FROM orders";
                    $get_all_orders = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($get_all_orders)){
                        $o_id = $row['o_id'];
                        $cust_id = $row['cust_id'];
                        $p_cat = $row['cat_id'];
                        $p_name = $row['p_name'];
                        $date = $row['date'];
                        $net_price = $row['net_price'];
                        $payment_mode = $row['payment_mode'];
                        
                        $query = "SELECT username FROM customer WHERE c_id = {$cust_id}";
                        $get_username = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($get_username)){
                            $cust_username = $row['username'];
                        }
                        //This Part needs work
                        $status='Completed';
                        //this part needs work end
                            
                        echo "<tr>";

                        echo "<td>$o_id</td>"; 
                        echo "<td>$cust_username</td>";
                        echo "<td>$net_price</td>";
                        echo "<td>$payment_mode</td>";
                        //This Part needs work
                        echo "<td>$status</td>";
                        //This Part needs work end

                        echo "<td><a href='adminOrderSummary.php?o_id=$o_id' style='text-decoration:none; color:green;'>View Order</a></td>";
                        echo "</tr>";
                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/gad1.jpg" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>
   

   
