<?php include"includes/admin_header.php"; ?>
  
<!--SEND FORM DATA TO DATABASE  -->
<?php 

    if(isset($_POST['submit'])){
        $flag = 0;
        $cat_title = $_POST['cat_title'];

        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUES('$cat_title')";
        
        $category_insert_query = mysqli_query($connection, $query);
        confirm($category_insert_query);
  
        $flag=1;
        $_POST['cat_title'] = '';
    }

?>  
       
        <?php include "includes/admin_navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>ADD NEW CATEGORY</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns form">
                <form class="register" action="" method="post">

<?php 
    global $flag;
    if($flag==1){
        echo "<div style='background-color: #4de32b; font-family: Montserrat;'><p>Category Successfully Added. Click here to <a href='viewAllCategories.php' style='color:#0048ff'>View All Categories</a></p></div><br>";
    } 

?>
                    <div>
                        <label for="cat_title">Category Name</label>
                        <input type="text" name="cat_title" id="cat_title" oninvalid="this.setCustomValidity('Required Field')" required>
                    </div>                    
                    
                    <br>
                    <input class="button" type="submit" name="submit" value="Add Category">
                    
                </form> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>