<?php

ob_start();

//session_start();

defined("DB_HOST") ? null : define("DB_HOST", "gstanza.cxqu4aok5wdg.ap-south-1.rds.amazonaws.com");
defined("DB_USER") ? null : define("DB_USER", "admin");
defined("DB_PASS") ? null : define("DB_PASS", "adminredhat");
defined("DB_NAME") ? null : define("DB_NAME", "gamingprods");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
    die("CONNECTION FAILED" . mysqli_error($connection));
}
