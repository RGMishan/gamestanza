<?php include"includes/customer_header.php"; ?>
   
   
    <div class="container">
       <div>
           <h1 class="styleFontface">Online Grocery Shopping</h1>
           <h1 class="welcome"><i class="fas fa-user"></i>  Welcome <?php echo $_SESSION['username']; ?></h1>
       </div>
       <hr>
       
        <?php include "includes/customer_navigation.php"; ?>

        
        <?php include "includes/imageSlider.php"; ?>
        
        <div class="gridContainer">
            <div class="header header1">
                <h2>ONLINE GROCERY SHOPPING</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns">
               <a href="#">
                   <div  class="box">
                        <div class="content">
                            <h4 class="contentHead">Manage Customers</h4>
                            <img src="images/prod1.jfif" class="contentImg" alt="">
                            <p class="contentText">Manage customers as you please so that no customer has to face any difficulties while shopping.</p>
                            <hr class="style2">
                            <i class="fas fa-angle-right"> Read More</i>
                        </div>
                    </div>
               </a>
            </div>
            <div class="columns">
                <a href="#">
                   <div  class="box">
                        <div class="content">
                            <h4 class="contentHead">Manage Stocks</h4>
                            <img src="images/prod2.jfif" class="contentImg" alt="">
                            <p class="contentText">Lets you manage and create new stock so that you are never out of stock to serve a loyal customer.</p>
                            <hr class="style2">
                            <i class="fas fa-angle-right"> Read More</i>
                        </div>
                    </div>
               </a>
            </div>
            <aside class="columns ad"><a href="#"><img src="images/ad1.jpg" alt=""></a></aside>
            <div class="columns">
                <a href="#">
                   <div  class="box">
                        <div class="content">
                            <h4 class="contentHead">Manage Product Company</h4>
                            <img src="images/prod3.jfif" class="contentImg" alt="">
                            <p class="contentText">Manage all the company data for the products so that every company's data is up to date and to keep a good tie up with companies.</p>
                            <hr class="style2">
                            <i class="fas fa-angle-right"> Read More</i>
                        </div>
                    </div>
               </a>
            </div>
            <div class="columns">
                <a href="#">
                   <div  class="box">
                        <div class="content">
                            <h4 class="contentHead">Manage Product Stores</h4>
                            <img src="images/prod4.jfif" class="contentImg" alt="">
                            <p class="contentText">All the stores which have these products as well as those will lend you the products in order ot serve customers.</p>
                            <hr class="style2">
                            <i class="fas fa-angle-right"> Read More</i>
                        </div>
                    </div>
               </a>
            </div>
            <aside class="columns ad2"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
        </div>


<?php include"includes/footer.php"; ?>