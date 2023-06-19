<?php
    session_start();
    include('connection.php');
    include('functions.php');
    $user_data = check_login($con);
    include('header.php');

    $user_ID = $user_data['user_ID'];
    $sql_order_queue = "SELECT * FROM order_queue WHERE user_ID = '$user_ID' and order_delivered = '0'";
    mysqli_query($con, $sql_order_queue);

    $order_queue_result = mysqli_query($con, $sql_order_queue);
    $num = mysqli_num_rows($order_queue_result);

    if($num >= 1){
        echo'
        <!-- Shopping Cart -->
            <section id = "special" class = "pt-5">
                <div class = "container">
                    <div class = "title text-center pt-5">
                        <h2 class = "position-relative d-inline-block">Pending Orders</h2>
                    </div>
                
                </div>
            </section>';

        $sql_user_order = "SELECT * FROM user_order WHERE user_ID = '$user_ID'";
        $user_order_result = mysqli_query($con, $sql_user_order);
        
        $total = 0;

        while($row_user_order = mysqli_fetch_array($user_order_result)){
            echo"
            <section id='cart-container' class='container my-5'>
            <table width='100%' class='table table-bordered table-sm align-middle text-center bg-white table-hover'>
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
                
                
                    $order_ID = $row_user_order['order_ID'];
                    $sql_user_order_grouped = "SELECT * FROM user_order WHERE order_ID = '$order_ID'";
                    $user_order_grouped = mysqli_query($con, $sql_user_order_grouped);

                while($row_order_queue = mysqli_fetch_array($user_order_grouped)){

                    $tmp_cart_rand = $row_order_queue['tmp_cart_rand'];
                    $sql_tmp_cart = "SELECT * FROM tmp_cart WHERE tmp_cart_rand ='$tmp_cart_rand'";
                    $tmp_cart_result = mysqli_query($con, $sql_tmp_cart);
                    

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
                    
                }
                
            echo"
            
            </tbody>
        
            </table>
            </section>
        ";
        }

    }
    else{
        echo "<div class='text-center px-5 py-5'><p>&nbsp</p>
        <p>&nbsp</p>
        <p>&nbsp</p>
            <div class='formContainer rounded-5'>
                There are no Pending Orders
            </div>
        </div>";
        
    }
?>



<?php
    include('footer.php');
?>