<?php include"includes/admin_header.php"; ?>
  
<!--GET DATA FROM DATABASE  -->
<?php 

    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
        
        $query = "SELECT * FROM product WHERE p_id = {$p_id}";
        
        $edit_query = mysqli_query($connection,$query);
        confirm($edit_query);
        
        while( $row = mysqli_fetch_assoc($edit_query)){
            $p_name = $row['p_name'];
            $p_desc = $row['p_desc'];
            $p_price = $row['p_price'];
            $p_quantity = $row['p_quantity'];
            $p_image = $row['p_image'];
            $s_email = $row['s_email'];
        }
    }
?> 
<!--END GET DATA FROM DATABASE-->
      
      
<!--UPDATE DATA INTO DATABASE-->
<?php 

    if(isset($_POST['submit'])){
        $flag = 0;
        $p_name = $_POST['p_name'];
        $p_quantity = $_POST['p_quantity'];
        $p_price = $_POST['p_price'];
        $p_desc = $_POST['p_desc'];
        $sEmail = $_POST['sEmail'];
        
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp = $_FILES['p_image']['tmp_name'];
        
        move_uploaded_file($p_image_tmp,"images/product/$p_image");
        
        if(empty($p_image)){
            $query = "SELECT * FROM product WHERE p_id = {$p_id}";
            
            $select_image = mysqli_query($connection,$query);
            confirm($select_image);
            
            while($row = mysqli_fetch_assoc($select_image)){
                $p_image = $row['p_image'];
            }
        }

        $query = "UPDATE product SET ";
        $query .= "p_name = '{$p_name}',";
        $query .= "p_quantity = '{$p_quantity}',";
        $query .= "p_price = {$p_price},";
        $query .= "p_desc = '{$p_desc}',";
        $query .= "p_image = '{$p_image}',";
        $query .= "s_email = '{$sEmail}' ";
        $query .= "WHERE p_id = {$p_id}";
        
        $product_update_query = mysqli_query($connection, $query);
        confirm($product_update_query);
  
        $flag=1;
        $_POST['p_price'] = '';
    }


?>
<!--END UDATE DATA INTO DATABASE-->
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>EDIT PRODUCT</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns form">
                <!-- FORM STARTS -->
                <form class="register" action="" method="post" enctype="multipart/form-data">

<?php 
    global $flag;
    if($flag==1){
        echo "<div style='background-color: #4de32b; font-family: Montserrat;'><p>Product Successfully Edited. Click here to <a href='viewAllProducts.php' style='color:#0048ff'>View All Products</a></p></div><br>";
    } 

?>
                    <div>
                        <label for="p_name">Product Name</label>
                        <input type="text" name="p_name" id="p_name" value="<?php if(isset($p_name)){ echo $p_name; } ?>" oninvalid="this.setCustomValidity('Required Field')" required>
                    </div>
                    <br>
                    <div>
                        <label for="p_quantity">Product Quantity</label>
                        <input type="text" name="p_quantity" value="<?php if(isset($p_quantity)){ echo $p_quantity; } ?>" oninvalid="this.setCustomValidity('Required Field')" required>
                    </div>
                    <br>
                    <div>
                        <label for="p_price">Product Price</label>
                        <span>&#8360;.  <input type="text" name="p_price" id="price" value="<?php if(isset($p_price)){ echo $p_price; } ?>" oninvalid="this.setCustomValidity('Only Numbers Allowed')" required></span>
                        
                        <?php include "includes/checkDetails.php"; ?>
                        <span id="priceStatus"></span>
                    </div>
                    <br>
                    <div>
                        <label for="p_image">Product Image</label>
                        <img id="edit_img" width="100px" src="images/product/<?php echo $p_image; ?>" alt="">
                        <input type="file" name="p_image">
                    </div>
                    <br>
                    <div>
                        <label for="sEmail">Seller E-mail</label>
                        <input type="email" name="sEmail" value="<?php if(isset($s_email)){ echo $s_email; } ?>" oninvalid="this.setCustomValidity('Invalid Email')" required>
                    </div>
                    <br>
                    <div>
                        <label for="p_desc">Product Description</label>
                        <textarea name="p_desc" id="textarea" cols="200" rows="10"><?php if(isset($p_desc)){ echo $p_desc; } ?></textarea>
                    </div>
                    
                    
                    <br>
                    <input class="button" type="submit" name="submit" value="Edit Product">
                    
                </form><!-- FORM ENDS -->
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>