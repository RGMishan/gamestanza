<?php 

define("SECRETKEY","MjaVGcI.YTkd8S6KHHsl0A1EqNZx");

function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function password_encrypt($password){
    $hash = openssl_encrypt($password,"AES-128-ECB", SECRETKEY);
    return $hash;
}

function password_decrypt($password){
    $plain = openssl_decrypt($password,"AES-128-ECB", SECRETKEY);
    return $plain;
}

function password_change($password, $username, $role){
    global $connection;
    $query = "UPDATE login SET password = '{$password}' WHERE username = '{$username}'";
    $result = mysqli_query($connection, $query);
    confirm($result);
    
    if($role  === 'admin'){
        $query = "UPDATE admin SET password = '{$password}' WHERE username = '{$username}'";
        $result = mysqli_query($connection, $query);
        confirm($result);
    } else if($role === 'customer'){
        $query = "UPDATE customer SET password = '{$password}' WHERE username = '{$username}'";
        $result = mysqli_query($connection, $query);
        confirm($result);
    } else{
        $query = "UPDATE seller SET password = '{$password}' WHERE username = '{$username}'";
        $result = mysqli_query($connection, $query);
        confirm($result);
    }
    
}
