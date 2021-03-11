<?php include "includes/header.php"; ?>

<!--SEND FORM DATA TO DATABASE  -->
<?php

if (isset($_POST['submit'])) {
    //THIS IS HERE SO THAT IF THE FORM RE-SUBMITS AND THE USERNAME IS ALREADY INSERTED INTO THE TABLE
    $c_username = $_POST['username'];
    $query = "SELECT * FROM login WHERE username = '$c_username'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_num_rows($result);
    if ($row == 1) {
        header("Location: customerRegistration.php");
    }/*Re-Submission check ENDS*/ else {
        $flag = 0;
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $c_email = $_POST['cEmail'];
        $c_address = $_POST['cAddr'];
        $c_city = $_POST['cCity'];
        $c_state = $_POST['cState'];
        $c_pincode = $_POST['cPincode'];
        $c_mobile = $_POST['cMobile'];
        $password = $_POST['password'];

        $hash_password = password_encrypt($password);

        $query = "INSERT INTO customer(username, password, first_name, last_name, c_email, c_address, c_city, c_state, c_pincode, c_mobile) ";
        $query .= "VALUES('$c_username', '$hash_password', '$first_name', '$last_name', '$c_email', '$c_address', '$c_city', '$c_state', '$c_pincode', '$c_mobile')";
        $customer_insert_query = mysqli_query($connection, $query);
        confirm($customer_insert_query);

        $query1 = "INSERT INTO login(username, password, role) ";
        $query1 .= "VALUES('$c_username','$hash_password','customer')";
        $login_insert_query = mysqli_query($connection, $query1);
        confirm($login_insert_query);
        $flag = 1;
        $_POST['username'] = '';
    }
}

?>

<div class="container">
    <h1 class="styleFontface">Grocery Shop Management System</h1>

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
            <h2>NEW CUSTOMER REGISTRATION</h2>
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
                if ($flag == 1) {
                    echo "<div style='background-color: #4de32b; font-family: Montserrat;'><p>Registration Successful. Click here to <a href='login.php' style='color:#0048ff'>Login</a></p></div><br>";
                }

                ?>
                <div>
                    <label for="cUsername">Username</label>
                    <input type="text" name="username" id="username" oninvalid="this.setCustomValidity('Required Field')" required>

                    <?php include "includes/checkDetails.php"; ?>

                    <span id="status"></span>
                </div>
                <br>
                <div>
                    <label for="password">Password</label>
                    <input type="password" minlength="8" name="password" oninvalid="this.setCustomValidity('Required Field')" required>
                    <p>Note: Password should contain atleast 8 characters.</p>
                </div>
                <br>
                <div>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" oninvalid="this.setCustomValidity('Required Field')" required>
                </div>
                <br>
                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" required>
                </div>
                <br>
                <div>
                    <label for="cEmail">E-mail</label>
                    <input type="email" id="cEmail" name="cEmail" oninvalid="this.setCustomValidity('Invalid Email')" required>
                    <?php include "includes/checkDetails.php"; ?>

                    <span id="emailStatus"></span>
                </div>
                <br>
                <div>
                    <label for="cAddr">Address</label>
                    <input type="text" name="cAddr" required>
                </div>
                <br>
                <div>
                    <label for="cCity">City</label>
                    <input type="text" name="cCity" required>
                </div>
                <br>
                <div>
                    <label for="cState">State</label>
                    <input type="text" name="cState" required>
                </div>
                <br>
                <div>
                    <label for="cPincode">Pincode</label>
                    <input type="text" oninvalid="this.setCustomValidity('Invalid Pincode')" name="cPincode" minlength="6" maxlength="6" required>
                </div>
                <br>
                <div>
                    <label for="cMobile">Mobile No.</label>
                    <input type="tel" name="cMobile" id="mobile" minlength="10" maxlength="10" oninvalid="this.setCustomValidity('Invalid Mobile Number')" required>

                    <?php include "includes/checkDetails.php"; ?>
                    <span id="mobileStatus"></span>
                </div>


                <br>
                <input class="button" type="submit" name="submit">

            </form>
        </div>

        <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>

        <?php include "includes/footer.php"; ?>
