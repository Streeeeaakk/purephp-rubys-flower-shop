<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
    
    
    date_default_timezone_set('Asia/Hong_Kong');
    $dataTime = date("Y-m-d H:i:s");

    $user_ID = $user_data['user_ID'];
    $address_ID = $_POST['address'];
    $order_paymentMethod = $_POST['payment'];
    $tmp_cart_rand = $_POST['tmp_cart_rand'];
    $order_datePlaced = $dataTime;

    $sql_tmp_cart = "SELECT * FROM tmp_cart where user_ID = '$user_ID' and tmp_cart_rand = '$tmp_cart_rand'";
    $result_tmp_cart = mysqli_query($con, $sql_tmp_cart);


    

    $sql_order = "INSERT INTO user_order(user_ID, address_ID, order_paymentMethod, order_datePlaced, tmp_cart_rand)values('$user_ID', '$address_ID', '$order_paymentMethod', '$order_datePlaced', '$tmp_cart_rand')";
    mysqli_query($con, $sql_order);

    while($row_tmp_cart = mysqli_fetch_array( $result_tmp_cart )){
    $cart_ID = $row_tmp_cart['cart_ID'];

    $sql_order_sel = "SELECT * FROM user_order where user_ID = '$user_ID' and tmp_cart_rand = '$tmp_cart_rand'";
    $result_order = mysqli_query($con, $sql_order_sel);
    $row_user_order = mysqli_fetch_array($result_order);

    
    $order_ID = $row_user_order['order_ID'];
    $prod_ID = $row_tmp_cart['prod_ID'];
    $prod_quantity = $row_tmp_cart['prod_quantity'];

    $sql_order_queue = "INSERT INTO order_queue(user_ID, order_ID, prod_ID, prod_quantity)values('$user_ID', '$order_ID', '$prod_ID', '$prod_quantity')";
    mysqli_query($con, $sql_order_queue);
    
    $sql_cart = "DELETE FROM cart WHERE cart_ID = '$cart_ID' and user_ID ='$user_ID'";
    mysqli_query($con,$sql_cart);

    
    }

    echo "Successfuly Placed Order! <p>Redirecting in 3 seconds...";
    echo '<meta http-equiv="refresh" content="3;url=index.php" />';




?>