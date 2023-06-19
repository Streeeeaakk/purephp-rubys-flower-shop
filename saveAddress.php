<?php

    include('connection.php');
    $user_ID = $_POST['user_ID'];
    $address_street = $_POST['address_street'];
    $address_barangay = $_POST['address_barangay'];
    $address_city = $_POST['address_city'];
    $address_province = $_POST['address_province'];
    $address_zipcode = $_POST['address_zipcode'];
    $address_country = $_POST['address_country'];


    $query = "INSERT into user_address(user_ID, address_street, address_barangay, address_city, address_province, address_zipcode, address_country) 
    values ('$user_ID', '$address_street', '$address_barangay', '$address_city', '$address_province', '$address_zipcode', '$address_country')";

    if(!empty($user_ID) && !empty($address_city) && !empty($address_country)){
        mysqli_query($con, $query);
        echo "Sucessfuly Saved! <p>Redirecting in 3 seconds...";
        echo '<meta http-equiv="refresh" content="3;url=index.php" />';
    }
    else{
        echo "Error <p>Redirecting in 3 seconds...";
        echo '<meta http-equiv="refresh" content="3;url=index.php" />';
    }
?>