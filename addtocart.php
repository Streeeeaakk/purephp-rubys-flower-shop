<?php

use function PHPUnit\Framework\isEmpty;

include('connection.php');

$prod_ID = $_POST['prod_ID'];
$user_ID = $_POST['user_ID'];
$prod_quantity = $_POST['prod_quantity'];

$s = "select * from cart where prod_ID = '$prod_ID' and user_ID ='$user_ID'";
$result = mysqli_query($con, $s);
$num = mysqli_num_rows($result);

            if($num == 1){
                echo "Product is already in cart! <p>Redirecting in 3 seconds...";
                echo '<meta http-equiv="refresh" content="3;url=index.php" />';

            }
            else{
                if(!empty($prod_quantity)){

                    if($prod_quantity <= 0){
                        echo "Quantity cannot be 0 or less than 0! <p>Redirecting in 3 seconds...";
                        echo '<meta http-equiv="refresh" content="3;url=index.php" />';
                    }

                    else{
                        $sql = "insert into cart(user_ID, prod_ID, prod_quantity) values ('$user_ID','$prod_ID','$prod_quantity')";
                        mysqli_query($con, $sql);
                        header('Location: index.php');
                    }

                }
                else{
                    echo "Quantity cannot be Empty! <p>Redirecting in 3 seconds...";
                    echo '<meta http-equiv="refresh" content="3;url=index.php" />';
                }
            }


