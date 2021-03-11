<?php include"includes/admin_header.php"; ?>
      
<!--DELETE CUTOMER-->
<?php 

   if(isset($_GET['delete_id'])){
        $customer_del_id = $_GET['delete_id'];
        
        $query = "DELETE FROM customer WHERE c_id = {$customer_del_id}";
        $del_query = mysqli_query($connection,$query);
        confirm($del_query);
        header("Location: adminManageCustomers.php");
    }

?>
<!--DELETE CUSTOMER END-->
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>ALL CUSTOMERS</h2>
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
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Mobile No.</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $query = "SELECT * FROM customer";
                    $get_all_customers = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($get_all_customers)){
                        $c_id = $row['c_id'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $c_email = $row['c_email'];
                        $c_address = $row['c_address'];
                        $c_city = $row['c_city'];
                        $c_state = $row['c_state'];
                        $c_pincode = $row['c_pincode'];
                        $c_mobile = $row['c_mobile'];
                            
                        echo "<tr>";

                        echo "<td>$c_id</td>"; 
                        echo "<td>$first_name $last_name</td>";
                        echo "<td>$c_email</td>";
                        echo "<td>$c_address, $c_city, $c_state - $c_pincode</td>";
                        echo "<td>$c_mobile</td>";

                        echo "<td><a href='editCustomer.php?c_id=$c_id' style='text-decoration:none; color:green;'>Edit</a></td>";
                        echo "<td><a href='adminManageCustomers.php?delete_id=$c_id' style='text-decoration:none; color:red;'>Delete</a></td>";
                        echo "</tr>";
                        echo "</tr>";
                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/gad1.jpg" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>
   

   
