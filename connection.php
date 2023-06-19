<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "oldcomp";

$db = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)){	
    die("Failed to connect!");
}
