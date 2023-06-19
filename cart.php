<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    include("header.php");
$user_ID = $user_data['user_ID'];
    
$sql = ("SELECT * FROM cart WHERE user_ID ='$user_ID'");
mysqli_query($con, $sql);

$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);


if($num >= 1){
                echo'
                <!-- Shopping Cart -->
                <section id = "special" class = "pt-5">
                    <div class = "container">
                        <div class = "title text-center pt-5">
                            <h2 class = "position-relative d-inline-block">Shopping Cart</h2>
                        </div>
                        
                    </div>
                </section>';

                echo"
                <section id='cart-container' class='container my-5'>
                        <table width='100%' class='table table-bordered table-sm align-middle text-center bg-white table-hover'>
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>Remove</td>
                                    <td>Image</td>
                                    <td>Product</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                            
                            
                            <form action='transaction.php' method='post'>
                            <tr>";

                    
                while($row = mysqli_fetch_array( $result )){

                    $cart_ID = $row['cart_ID'];
                    $cart_prod_ID = $row['prod_ID'];
                    $prod_quantity = $row['prod_quantity'];

                    $sql2 = ("select * from product where prod_ID = '$cart_prod_ID'");
                    mysqli_query($con, $sql2);
                    $result2 = mysqli_query($con, $sql2);

                    $row2 = mysqli_fetch_array($result2);

                    $prod_ID = $row2['prod_ID'];
                    $prod_name = $row2['prod_name'];
                    $prod_picture = $row2['prod_picture'];
                    $prod_price = $row2['prod_price'];

                    $total = 0.00;
                    $total = $prod_price * $prod_quantity;

                                    echo"
                                
                                            <td>
                                            <input type='checkbox' id='cart' name='product[]' value='$prod_ID'></td>
                                            <td><a href='delete_cart.php?id=$cart_ID'><i class='fas fa-trash-alt'></i></a></td>


                                            <td><img src = 'images/products/{$row2['prod_picture']}' width='200'  ></td>
                                            <td>
                                                <h5>{$row2['prod_name']}</h5>
                                            </td>
                                            <td>
                                                <h5>₱{$row2['prod_price']}.00</h5>
                                            </td>
                                            <td>
                                                <h5>{$row['prod_quantity']}</h5>
                                                <a href='editQuantity2.php?prod_ID=$prod_ID&cart_ID=$cart_ID&user_ID=$user_ID&prod_quantity=$prod_quantity' class='btn btn-primary'>Edit Quantity</a>
                                            </td>
                                            <td>
                                                <h5>₱$total.00</h5>
                                            </td>

                                            
                                        </tr>";
                                       
                    }
                    echo "
                    <div class='text-center px-2 pb-5'><a href='deleteAllfromCart.php?user_ID=$user_ID' class='btn btn-secondary text-center'>Clear Cart</a></div>
                    <input type ='submit' class='btn btn-primary' value='Place Order' name='create'/>
                    
                    </form>";
                    
                }   


else{
    echo "<div class='text-center px-5 py-5'><p>&nbsp</p>
    <p>&nbsp</p>
    <p>&nbsp</p>
        <div class='formContainer rounded-5'>
            Cart is Empty
        </div>
    </div>";
    
}

echo"
</tbody>
</table>
</section>";
?>



    



    
<?php

include('footer.php');

?>