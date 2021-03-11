<?php include"includes/admin_header.php"; ?>
  
<!--SEND FORM DATA TO DATABASE  -->
<?php 

    if(isset($_POST['submit'])){
        $flag = 0;
        $p_name = $_POST['p_name'];
        $cat_id = $_POST['cat_id'];
        $p_quantity = $_POST['p_quantity'];
        $p_price = $_POST['p_price'];
        $p_desc = $_POST['p_desc'];
        $sEmail = $_POST['sEmail'];
        
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp = $_FILES['p_image']['tmp_name'];
        
        move_uploaded_file($p_image_tmp,"images/product/$p_image");

        $query = "INSERT INTO product(p_name, cat_id, p_quantity, p_price, p_desc, s_email, p_image) ";
        $query .= "VALUES('$p_name', $cat_id, '$p_quantity', '$p_price', '$p_desc', '$sEmail', '$p_image')";
        
        $product_insert_query = mysqli_query($connection, $query);
        confirm($product_insert_query);
  
        $flag=1;
        $_POST['p_price'] = '';
    }

?>  
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>ADD NEW PRODUCT</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns form">
                <form class="register" action="" method="post" enctype="multipart/form-data">

<?php 
    global $flag;
    if($flag==1){
        echo "<div style='background-color: #4de32b; font-family: Montserrat;'><p>Product Successfully Added. Click here to <a href='viewAllProducts.php' style='color:#0048ff'>View All Products</a></p></div><br>";
    } 

?>
                    <div>
                        <label for="p_name">Product Name</label>
                        <input type="text" name="p_name" id="p_name" oninvalid="this.setCustomValidity('Required Field')" required>
                    </div>
                    <br>
                       <div>
                        <label for="cat_id">Product Category</label>
                        <select name="cat_id">
                            <option value="category">Choose Product Category</option>
                        <?php 
                        
                           $query = "SELECT * FROM categories";
                           $category_query = mysqli_query($connection, $query);
                           confirm($category_query);
                           
                           while( $row = mysqli_fetch_assoc($category_query)){
                               $cat_id = $row['cat_id'];
                               $cat_title = $row['cat_title'];
                            ?>
                               <option value="<?php echo $cat_id ?>"><?php echo "$cat_title"?></option>";
                        <?php
                           }
                        ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="p_quantity">Product Quantity</label>
                        <input type="text" name="p_quantity" oninvalid="this.setCustomValidity('Required Field')" required>
                    </div>
                    <br>
                    <div>
                        <label for="p_price">Product Price</label>
                        <span>&#8360;.  <input type="text" name="p_price" id="price" oninvalid="this.setCustomValidity('Only Numbers Allowed')" required></span>
                        
                        <?php include "includes/checkDetails.php"; ?>
                        <span id="priceStatus"></span>
                    </div>
                    <br>
                    <div>
                        <label for="p_image">Product Image</label>
                        <input type="file" name="p_image" required>
                    </div>
                    <br>
                    <div>
                        <label for="sEmail">Seller E-mail</label>
                        <input type="email" name="sEmail" oninvalid="this.setCustomValidity('Invalid Email')" required>
                    </div>
                    <br>
                    <div>
                        <label for="p_desc">Product Description</label>
                        <textarea name="p_desc" id="textarea" cols="200" rows="10"></textarea>
                    </div>
                    
                    
                    <br>
                    <input class="button" type="submit" name="submit" value="Add Product">
                    
                </form> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>
