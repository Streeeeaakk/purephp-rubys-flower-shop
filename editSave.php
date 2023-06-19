<?php

include('connection.php');

$prod_ID = $_GET['prod_ID'];
$prod_category = $_GET['prod_category'];
$prod_name = $_GET['prod_name'];
$prod_price = $_GET['prod_price'];
$prod_details = $_GET['prod_details'];

$sql = "UPDATE product SET prod_name='$prod_name', prod_category='$prod_category',prod_price='$prod_price', prod_details='$prod_details' WHERE prod_ID = '$prod_ID'";

if($con -> query($sql) === TRUE){
    header("Location: addproducts.php");
}else{
    echo "Error Updating Record";
}

$con -> close();
?>