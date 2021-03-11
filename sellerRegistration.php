<?php include"includes/header.php"; ?>
   
<?php 

    if(isset($_POST['submit'])){
        //THIS IS HERE SO THAT IF THE FORM RE-SUBMITS AND THE USERNAME IS ALREADY INSERTED INTO THE TABLE
        $s_username = $_POST['username'];
        $query = "SELECT * FROM login WHERE username = '$s_username'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_num_rows($result);
        if($row==1){
            header("Location: sellerRegistration.php");
        }/*Re-Submission check ENDS*/
        else{
            $flag = 0;
            $s_firstname = $_POST['sFname'];
            $s_lastname = $_POST['sLname'];
            $s_email = $_POST['sEmail'];
            $s_pancard = $_POST['sPan'];
            $s_account = $_POST['sAccount'];
            $s_bank = $_POST['bank'];
            $password = $_POST['password'];

            $hash_password = password_encrypt($password);
            
            $query = "INSERT INTO seller(username, password, s_firstname, s_lastname, s_email, s_pancard, s_account, s_bank) ";
            $query .= "VALUES('$s_username', '$hash_password', '$s_firstname', '$s_lastname', '$s_email', '$s_pancard', '$s_account', '$s_bank')";
            $seller_insert_query = mysqli_query($connection, $query);
            confirm($seller_insert_query);

            $query1 = "INSERT INTO login(username, password, role) ";
            $query1 .= "VALUES('$s_username','$hash_password','seller')";    
            $login_insert_query = mysqli_query($connection, $query1);
            confirm($login_insert_query);    
            $flag=1;
            $_POST['username'] = '';
            $_POST['sEmail'] = '';
            $_POST['sPan'] = '';
            $_POST['sAccount'] = '';
        }
    }

?>
   
    <div class="container">
       <h1 class="styleFontface">Grocery Shop Management System</h1>
       
       <hr>
       
        <?php include "includes/navigation.php"; ?>
        
        <div class="banner">
                
        </div>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>NEW SELLER REGISTRATION</h2>
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
        echo "<div style='background-color: #4de32b; font-family: Montserrat;'><p>Registration Successful. Click here to <a href='login.php' style='color:#0048ff'>Login</a></p></div><br>";
    } 

?>
                    <div>
                        <label for="sUsername">Username</label>
                        <input type="text" name="username" id="username" oninvalid="this.setCustomValidity('Required Field')" required>
                        <?php include "includes/checkDetails.php"; ?>
                        
                        <span id="status"></span>
                    </div>
                    <br>
                    <div>
                        <label for="sPassword">Password</label>
                        <input type="password" minlength="8" name="password" oninvalid="this.setCustomValidity('Required Field')" required>
                        <p>Note: Password should contain atleast 8 characters.</p>
                    </div>
                    <br>
                    <div>
                        <label for="sFname">First Name</label>
                        <input type="text" name="sFname" oninvalid="this.setCustomValidity('Required Field')" required>
                    </div>
                    <br>
                    <div>
                        <label for="sLname">Last Name</label>
                        <input type="text" name="sLname" required>
                    </div>
                    <br>
                    <div>
                        <label for="sEmail">E-mail</label>
                        <input type="email" name="sEmail" id="sEmail" oninvalid="this.setCustomValidity('Invalid Email')" required>
                        <?php include "includes/checkDetails.php"; ?>
                        
                        <span id="emailStatus"></span>
                    </div>
                    <br>
                    <div>
                        <label for="sPan">Pancard No.</label>
                        <input type="text" name="sPan" id="pancard" required>
                        <?php include "includes/checkDetails.php"; ?>
                        
                        <span id="panStatus"></span>
                    </div>
                    <br>
                    <div>
                        <label for="sAccount">Account No.</label>
                        <input type="text" oninvalid="this.setCustomValidity('Invalid Account No.')" name="sAccount" id="account" required>
                        
                        <?php include "includes/checkDetails.php"; ?>
                        
                        <span id="accountStatus"></span>
                    </div>
                    <br>
                    <div>
                        <label for="bank">Bank Name</label>
                        <input type="text" name="bank" required>
                    </div>
                    
                    
                    <br>
                    <input class="button" type="submit" name="submit">
                    
                </form> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/ad2.jfif" alt=""></a></aside>
            
<?php include"includes/footer.php"; ?>