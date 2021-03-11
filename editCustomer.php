<?php include"includes/admin_header.php"; ?>
  
<!--GET DATA FROM DATABASE  -->
<?php 

    if(isset($_GET['c_id'])){
        $c_id = $_GET['c_id'];
        
        $query = "SELECT * FROM customer WHERE c_id = {$c_id}";
        
        $edit_query = mysqli_query($connection,$query);
        confirm($edit_query);
        
        while( $row = mysqli_fetch_assoc($edit_query)){
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $c_email = $row['c_email'];
            $c_address = $row['c_address'];
            $c_city = $row['c_city'];
            $c_state = $row['c_state'];
            $c_pincode = $row['c_pincode'];
            $c_mobile = $row['c_mobile'];
        }
    }
?> 
<!--END GET DATA FROM DATABASE-->
      
      
<!--UPDATE DATA INTO DATABASE-->
<?php 

    if(isset($_POST['submit'])){
        $flag = 0;
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $c_email = $row['c_email'];
        $c_address = $row['c_address'];
        $c_city = $row['c_city'];
        $c_state = $row['c_state'];
        $c_pincode = $row['c_pincode'];
        $c_mobile = $row['c_mobile'];

        $query = "UPDATE customer SET ";
        $query .= "first_name = '{$first_name}',";
        $query .= "last_name = '{$last_name}',";
        $query .= "c_email = {$c_email},";
        $query .= "c_address = '{$c_address}',";
        $query .= "c_state = '{$c_city}',";
        $query .= "s_email = '{$c_state}', ";
        $query .= "c_pincode = '{$c_pincode}', ";
        $query .= "c_mobile = '{$c_mobile}' ";
        $query .= "WHERE c_id = {$c_id}";
        
        $customer_update_query = mysqli_query($connection, $query);
        confirm($customer_update_query);
  
        $flag=1;
        
    }


?>
<!--END UDATE DATA INTO DATABASE-->
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>EDIT CUSTOMER DETAILS</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns form">
                <!-- FORM STARTS -->
                <form class="register" action="" method="post">

<?php 
    global $flag;
    if($flag==1){
        echo "<div style='background-color: #4de32b; font-family: Montserrat;'><p>Customer Information Updated Successfully. Click here to <a href='viewAllProducts.php' style='color:#0048ff'>View All Customers</a></p></div><br>";
    } 

?>
                    <div>
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" oninvalid="this.setCustomValidity('Required Field')" value="<?php if(isset($first_name)){ echo $first_name; } ?>" required>
                    </div>
                    <br>
                    <div>
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="<?php if(isset($last_name)){ echo $last_name; } ?>" required>
                    </div>
                    <br>
                    <div>
                        <label for="c_email">E-mail</label>
                        <input type="email" id="cEmail" name="c_email" value="<?php if(isset($c_email)){ echo $c_email; } ?>" oninvalid="this.setCustomValidity('Invalid Email')" required>
                        <?php include "includes/checkDetails.php"; ?>
                        
                        <span id="emailStatus"></span>
                    </div>
                    <br>
                    <div>
                        <label for="c_address">Address</label>
                        <input type="text" name="c_address" value="<?php if(isset($c_address)){ echo $c_address; } ?>" required>
                    </div>
                    <br>
                    <div>
                        <label for="c_city">City</label>
                        <input type="text" name="c_city" value="<?php if(isset($c_city)){ echo $c_city; } ?>" required>
                    </div>
                    <br>
                    <div>
                        <label for="c_state">State</label>
                        <input type="text" name="c_state" value="<?php if(isset($c_state)){ echo $c_state; } ?>" required>
                    </div>
                    <br>
                    <div>
                        <label for="c_pincode">Pincode</label>
                        <input type="text" oninvalid="this.setCustomValidity('Invalid Pincode')" name="c_pincode" value="<?php if(isset($c_pincode)){ echo $c_pincode; } ?>" minlength="6" maxlength="6" required>
                    </div>
                    <br>
                    <div>
                        <label for="c_mobile">Mobile No.</label>
                        <input type="tel" name="c_mobile" id="mobile" value="<?php if(isset($c_mobile)){ echo $c_mobile; } ?>" minlength="10" maxlength="10" oninvalid="this.setCustomValidity('Invalid Mobile Number')" required>
                        
                        <?php include "includes/checkDetails.php"; ?>
                        <span id="mobileStatus"></span>
                    </div>
                    
                    
                    <br>
                    <input class="button" type="submit" name="submit" value="Edit Customer Info">
                    
                </form><!-- FORM ENDS -->
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>