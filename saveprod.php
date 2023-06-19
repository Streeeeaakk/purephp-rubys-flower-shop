<?php

include('connection.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
        $prod_name = $_POST['prod_name'];
        $prod_price = $_POST['prod_price'];
        $prod_details = $_POST['prod_details'];
        $prod_category = $_POST['prod_category'];

    if(!empty($prod_name) && !empty($prod_price) && !is_numeric($prod_name)){
        //save to database

        $msg = "";
        $s = "select * from product where prod_name = '$prod_name'";
        $result = mysqli_query($con, $s);
        $num = mysqli_num_rows($result);
        
        date_default_timezone_set('Asia/Hong_Kong');
        $dataTime = date("Y-m-d H:i:s");

        $target_dir = "images/products/";
        $target_file = $target_dir . basename($_FILES["choosefile"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["choosefile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["choosefile"]["name"]). " has been uploaded.";
            
                echo '<meta http-equiv="refresh" content="3;url=addproducts.php" />';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $image=basename( $_FILES["choosefile"]["name"]);

        if($num == 1){
            echo "Product is already saved";
        }
        else{
            $query = "insert into product (prod_name, prod_category, prod_price, prod_details, prod_dateAdded, prod_picture) 
            values ('$prod_name', '$prod_category','$prod_price', '$prod_details', '$dataTime', '$image')";
            mysqli_query($con, $query);

            
    
            header("Location: addproducts.php");
        }

    }
    else{
        echo "Please enter some valid information";
    }
}