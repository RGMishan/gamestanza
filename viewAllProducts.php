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
                <h2>ALL PRODUCTS</h2>
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
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Image</th>
                        <th>Product Description</th>
                        <th>Seller Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $query = "SELECT * FROM product";
                    $get_all_product = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($get_all_product)){
                        $p_id = $row['p_id'];
                        $p_name = $row['p_name'];
                        $p_price = $row['p_price'];
                        $p_quantity = $row['p_quantity'];
                        $p_image = $row['p_image'];
                        $p_desc = $row['p_desc'];
                        $s_email = $row['s_email'];
                        echo "<tr>";

                        echo "<td>$p_id</td>"; 
                        echo "<td>$p_name</td>";
                        echo "<td>$p_price</td>";
                        echo "<td>$p_quantity</td>";
                        echo "<td><img src='images/product/$p_image' alt='image' width='100px'></td>";
                        echo "<td>$p_desc</td>";
                        echo "<td>$s_email</td>";

                        echo "<td><a href='editProduct.php?p_id=$p_id' style='text-decoration:none; color:green;'>Edit</a></td>";
                        echo "<td><a href='viewAllProducts.php?delete_id=$p_id' style='text-decoration:none; color:red;'>Delete</a></td>";
                        echo "</tr>";
                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/gad1.jpg" alt="Gamestanza Advertisement"></a></aside>
            
<?php include"includes/footer.php"; ?>
   

   
