<?php ob_start(); ?>
<?php include "db.php" ?>
<?php include "functions.php" ?>
<?php session_start(); ?>


<?php 
    if(($_SESSION['role'])!=='seller'){
        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	<title>Online Grocery Shopping</title>
	
	
    <!-- CUSTOM CSS-->
	<link rel="stylesheet" href="css/grocery_homepage.css">
	<link rel="stylesheet" href="css/font.css">
	<link rel="stylesheet" href="css/all.css">
	
	<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>