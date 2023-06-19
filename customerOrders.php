<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    include("header.php");

    if(!($user_data['user_level']) == 0){
        header("Location: index.php");
    }

    $sql_order_queue = "SELECT * FROM order_queue WHERE order_delivered = '0'";
    mysqli_query($con, $sql_order_queue);

    $order_queue_result = mysqli_query($con, $sql_order_queue);
    $num = mysqli_num_rows($order_queue_result);

    if($num >= 1){
        echo'
        <!-- Shopping Cart -->
        
        <p>&nbsp</p>
            <section id = "special" class = "pt-5">
                <div class = "container">
                    <div class = "title text-center pt-5">
                        <h2 class = "position-relative d-inline-block">Pending Orders</h2>
                    </div>
                
                </div>
            </section>';

        $sql_user_order = "SELECT user_ID FROM user_order";
        $user_order_result = mysqli_query($con, $sql_user_order);
        $users = array();
        while($row_user_order = mysqli_fetch_array($user_order_result)){
            
            $user_ID_unique = $row_user_order['user_ID'];
            array_push($users, $user_ID_unique);
        }

        $sql_user_order2 = "SELECT * FROM user_order";
        $user_order_result2 = mysqli_query($con, $sql_user_order2);
        
        $total = 0;
        $unique_IDs = array_unique($users);

        foreach($unique_IDs as $user_ID){
            $sql_users = "SELECT * FROM user where user_ID = $user_ID";
            $user_result = mysqli_query($con, $sql_users);

            
                
           

            while($row_user = mysqli_fetch_array($user_result)){
                $sql_user_order2 = "SELECT * FROM user_order WHERE user_ID = '$user_ID'";
                $user_order_result2 = mysqli_query($con, $sql_user_order2);

                $user_fname = $row_user['user_fname'];
                $user_lname = $row_user['user_lname'];
    
                
                echo"
                <div class = 'title text-center pt-5'>
                    <h2 class = 'position-relative d-inline-block'>$user_fname $user_lname</h2>
                </div>";
                $total = 0;

                while($row_user_order = mysqli_fetch_array($user_order_result2)){


                            $order_ID = $row_user_order['order_ID'];
                            $sql_user_order_grouped = "SELECT * FROM user_order WHERE order_ID = '$order_ID'";
                            $user_order_grouped = mysqli_query($con, $sql_user_order_grouped);
                            
                    while($row_order_queue = mysqli_fetch_array($user_order_grouped)){
    
                        $tmp_cart_rand = $row_order_queue['tmp_cart_rand'];
                        $sql_tmp_cart = "SELECT * FROM tmp_cart WHERE tmp_cart_rand ='$tmp_cart_rand'";
                        $tmp_cart_result = mysqli_query($con, $sql_tmp_cart);

                        echo"
                        <section id='cart-container' class='my-5 d-flex justify-content-center'>
                        <div class='formContainer rounded-5 d-flex justify-content-center'>
                        <table width='100%' class='table table-bordered table-sm align-middle text-center bg-white table-hover formContainer'>
                            <thead>
                                <tr>
                                    <td>Picture</td>
                                    <td>Product</td>
                                    <td>Price</td>
                                    <td>Mode of Payment</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                </tr>
                            </thead>

                            <tbody>
                        <tr>";
                        while($row_tmp_cart = mysqli_fetch_array($tmp_cart_result)){

                            $prod_ID = $row_tmp_cart['prod_ID'];
    
    
    
                            $sql_prod = "SELECT * FROM product where prod_ID = '$prod_ID'";
                            $prod_result = mysqli_query($con,$sql_prod);
                            $row_prod = mysqli_fetch_array($prod_result);
    
                            $prod_picture = $row_prod['prod_picture'];
                            $prod_name = $row_prod['prod_name'];
                            $prod_price = $row_prod['prod_price'];
                            $order_paymentMethod = $row_user_order['order_paymentMethod'];
                            $prod_quantity = $row_tmp_cart['prod_quantity'];
                            $total = $prod_price * $prod_quantity;
    
                            echo"
                                <td>
                                    <img src = 'images/products/$prod_picture' width='200'  >
                                </td>
    
                                <td>
                                    <h5>$prod_name</h5>
                                </td>
    
                                <td>
                                    <h5>₱$prod_price</h5>
                                </td>
    
                                <td>
                                    <h5>$order_paymentMethod</h5>
                                </td>
    
                                <td>    
                                    <h5>$prod_quantity</h5>
                                </td>
                                
                                <td>
                                    <h5>₱$total.00</h5>
                                </td>
    
                                
                            </tr>
                        ";
                        }
                        echo"</tbody></tr></table></div></section>";
                    }
                }
            }
        }
    
    }
?>




<?php
    include("footer.php");
?>