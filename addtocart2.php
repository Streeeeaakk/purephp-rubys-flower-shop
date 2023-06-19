<?php

include('connection.php');

$prod_ID = $_POST['prod_ID'];
$user_ID = $_POST['user_ID'];
$cart_ID = $_POST['cart_ID'];
$prod_quantity = $_POST['prod_quantity'];




                if(!empty($prod_quantity)){

                    if($prod_quantity <= 0){
                        echo "Quantity cannot be 0 or less than 0! <p>Redirecting in 3 seconds...";
                        echo '<meta http-equiv="refresh" content="3;url=index.php" />';
                    }

                    else{
                        $sql = "UPDATE cart SET prod_quantity='$prod_quantity' WHERE cart_ID = '$cart_ID' and user_ID = '$user_ID'";
                        mysqli_query($con, $sql);
                        header('Location: cart.php');
                    }

                }
                else{
                    echo "Quantity cannot be Empty! <p>Redirecting in 3 seconds...";
                    echo '<meta http-equiv="refresh" content="3;url=index.php" />';
                }
            

