<?php 
require_once "db.php";
require_once "functions.php";

if(isConnected()){
    unset($_SESSION['user']);
} 
header("location:./index.php");

exit;
