<?php

session_start();
include('connection.php');

if(isset($_SESSION['user_email'])){
    unset($_SESSION['user_email']);
}


header("Location: login.php");
die;