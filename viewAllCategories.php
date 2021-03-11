<?php include"includes/admin_header.php"; ?>
      
<!--DELETE PRODUCT-->
<?php 

    if(isset($_GET['delete_id'])){
        $cat_del_id = $_GET['delete_id'];
        
        $query = "DELETE FROM categories WHERE cat_id = {$cat_del_id}";
        $del_query = mysqli_query($connection,$query);
        confirm($del_query);
        header("Location: viewAllCategories.php");
    }

?>
<!--DELETE PRODUCT END-->
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>ALL CATEGORIES</h2>
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
                        <th>Category Id</th>
                        <th>Category Title</th>
                        <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $query = "SELECT * FROM categories";
                    $get_all_categories = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($get_all_categories)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
    
                        echo "<tr>";

                        echo "<td>$cat_id</td>"; 
                        echo "<td>$cat_title</td>";

                        echo "<td><a href='viewAllCategories.php?delete_id=$cat_id' style='text-decoration:none; color:red;'>Delete</a></td>";
                        echo "</tr>";
                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>
   

   