<?php 

    include "db.php";

    //THIS CODE CHECKS FOR EXISTING ACCOUNT NO. 
    if(isset($_POST['sAccount'])){
        $s_account = mysqli_real_escape_string($connection, $_POST['sAccount']);
        
        if(!empty($s_account)){
            $query = "SELECT * FROM seller WHERE s_account = '$s_account'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_num_rows($result);
            
            if(!is_numeric($s_account)){
                echo "<div style='color:red;'>Invalid A/c No.</div>";
            }
            else if($row != 0){
                echo "<div style='color:red;'>This Seller is already registered.</div>";
            }
            
        }
    }/*SELLER ACCOUNT CHECK END*/

    //THIS CODE CHECKS FOR EXISTING PANCARD NO.
    if(isset($_POST['sPan'])){
        $s_pancard = mysqli_real_escape_string($connection, $_POST['sPan']);
        
        if(!empty($s_pancard)){
            $query = "SELECT * FROM seller WHERE s_pancard = '$s_pancard'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_num_rows($result);
            
            if($row != 0){
                echo "<div style='color:red;'>This Seller is already registered.</div>";
            }
        }
    }/*SELLER PAN CARD CHECK END*/

    //THIS CODE CHECKS FOR EXISTING EMAIL
    if(isset($_POST['sEmail'])){
        $s_email = mysqli_real_escape_string($connection, $_POST['sEmail']);
        
        if(!empty($s_email)){
            $query = "SELECT * FROM seller WHERE s_email = '$s_email'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_num_rows($result);
            
            if($row != 0){
                echo "<div style='color:red;'>This E-mail is already registered.</div>";
            }
        }
    } else if(isset($_POST['cEmail'])){
        $c_email = mysqli_real_escape_string($connection, $_POST['cEmail']);
        
        if(!empty($c_email)){
            $query = "SELECT * FROM customer WHERE c_email = '$c_email'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_num_rows($result);
            
            if($row != 0){
                echo "<div style='color:red;'>This E-mail is already registered.</div>";
            }
        }
    }/*EMAIL CHECK END*/

    //THIS CODE CHECKS FOR EXISTING MOBILE NUMBER 
    if(isset($_POST['cMobile'])){
        $cMobile = $_POST['cMobile'];
        
        if(!empty($cMobile)){
            if(!is_numeric($cMobile)){
                echo "<div style='color:red;'>Invalid Mobile No.</div>";
            }
        }
    }/*MOBILE NUMBER CHECK END*/

    
    //THIS CODE CHECKS FOR EXISTING USERNAME
    if(isset($_POST['username'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        
        if(!empty($username)){
            $query = "SELECT * FROM login WHERE username = '$username'";
            $result = mysqli_query($connection, $query);
            $row = mysqli_num_rows($result);
            
            if($row == 0){
                echo "<div style='color:green;'>Username Available</div>";
            }
            else{
                echo "<div style='color:red;'>" . $username . " is already taken</div>";
            }
        }
    }/*USERNAME CHECK END*/

    
    //CONFIRM PASSWORD CODE
    if(isset($_POST['confirmPassword']) && isset($_POST['newPassword'])){
        
        $newPassword = mysqli_real_escape_string($connection, $_POST['newPassword']);
        $confirmPassword = mysqli_real_escape_string($connection, $_POST['confirmPassword']);
        
        if(!empty($confirmPassword)){
            if($confirmPassword == $newPassword){
                echo "<div style='color:green;'>Password Match</div>";
            }
            else{
                echo "<div style='color:red;'>Password does not match.</div>";
            }
        }
    }/*CONFIRM PASSWORD CODE END*/


    //THIS CODE CHECKS FOR PRICE 
    if(isset($_POST['p_price'])){
        $p_price = $_POST['p_price'];
        
        if(!empty($p_price)){
            if(!is_numeric($p_price)){
                echo "<div style='color:red;'>Only Numbers Allowed</div>";
            }
        }
    }/*PRICE CHECK END*/
?>




