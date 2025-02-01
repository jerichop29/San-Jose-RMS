<?php

    error_reporting(0);
    
    $host = "localhost";
    $username = "root";
    $password ="";
    $db = "reservation";

    $con = mysqli_connect($host,$username,$password,$db) or die("Connection failed.");

?>