<?php include"includes/header.php"; ?>
            
    <div class="container">
       <h1 class="styleFontface">Gamestanza</h1>
       
       <hr>
       
        <?php 
            if($_SESSION['role']==='admin'){
                include "includes/admin_navigation.php";   
            } else if($_SESSION['role']==='customer'){
                include "includes/customer_navigation.php";
            } else {
                include "includes/seller_navigation.php";
            }
        
        
        ?>
        
        <div class="banner">
                
        </div>
        
        <?php 
        
            if(isset($_POST['passwordChange'])){
                $username = $_SESSION['username'];
                $role = $_SESSION['role'];
                
                $password = $_POST['confirmPassword'];
                $password = mysqli_real_escape_string($connection, $password);
                $hash = password_encrypt($password);
                
                $flag = 0;
                if($role === 'admin'){
                   password_change($hash, $username, $role);
                } else if($role === 'customer'){
                    password_change($hash, $username, $role);
                }else{
                    password_change($hash, $username, $role);
                }
                
                $flag = 1;
                $_POST['confirmPassword'] = '';
                $_POST['newPassword'] = '';
            }
        
        
        ?>

        
        <div class="gridLogin">
            <div class="header header1">
                <h2>CHANGE PASSWORD</h2>
                <hr class="style1">
            </div>
            <div class="header header2">
                <h2>ADVERTISEMENT</h2>
                <hr class="style1">
            </div>
            <div class="columns form">
                <form action="" method="post">
                   
<?php 
    global $flag;
    if($flag==1){
        echo "<div style='background-color: #4de32b; font-family: Montserrat;'><p>Password Changed Successfully</p></div><br>";
    } 

?>
                    <div>
                        <label for="newPass">New Password</label>
                        <input type="password" minlength="8" name="newPassword" id="newPassword" required>
                        <p>Note: Password should contain atleast 8 characters.</p>
                    </div>
                    <br>
                    <div>
                        <label for="password">Confirm New Password</label>
                        <input type="password" minlength="8" name="confirmPassword" id="confirmPassword" required>
                        
                        <?php include "includes/checkDetails.php"; ?>
                        
                        <span id="status"></span>
                    </div>
                    <br>
                    <input class="button" type="submit" name="passwordChange">
                    
                    <input class="button" type="reset" name="reset">
                </form> 
            </div>
            
            <aside class="columns ad"><a href="#"><img src="images/gad1.jpg" alt="Gamestanza"></a></aside>
            
<?php include"includes/footer.php"; ?>
