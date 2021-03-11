<?php include "includes/header.php"; ?>


<div class="container">
    <a href="index.php"><img src="images/logo.png" alt="Gamestanza" width="200px" style="margin-left: 20px;"></a>

    <hr>

    <div class="navbar">
        <ul>
            <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href=""><i class="fas fa-clipboard"></i> About</a></li>
            <li class="active"><a href="register.php"><i class="fas fa-user-plus"></i> Register</a></li>
            <li><a href=""><i class="fas fa-phone-alt"></i> Contact Us</a></li>

            <li class="right"><a class="rightLink" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
        </ul>
    </div>

    <div class="banner">

    </div>


    <div class="gridLogin">
        <div class="header header1">
            <h2>REGISTRATION</h2>
            <hr class="style1">
        </div>
        <div class="header header2">
            <h2>ADVERTISEMENT</h2>
            <hr class="style1">
        </div>
        <div class="columns form">
            <a href="customerRegistration.php"><button class="regButton button1">New Customer Registration</button></a>
            <a href="sellerRegistration.php"><button class="regButton button2">New Seller Registration</button></a>
        </div>

        <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>

        <?php include "includes/footer.php"; ?>
    </div>