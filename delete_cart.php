<?php

include('connection.php');

$id = $_GET['id'];

$sql = "delete from cart where cart_ID = '$id'";

if($con -> query($sql) === TRUE){
    header("Location: cart.php");
}else{
    echo "Error Deleting Record";
}

$con -> close();
?>