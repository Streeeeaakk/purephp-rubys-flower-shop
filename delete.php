<?php

include('connection.php');

$id = $_GET['id'];

$sql = "delete from product where prod_ID = '$id'";

if($con -> query($sql) === TRUE){
    header("Location: addproducts.php");
}else{
    echo "Error Deleting Record";
}

$con -> close();
?>