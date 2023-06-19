<?php
    include('connection.php');

    $user_ID = $_GET['user_ID'];

    $sql = "DELETE FROM cart where user_ID ='$user_ID'";
    mysqli_query($con, $sql);
    echo "Sucessfully cleared the cart! <p>Redirecting in 3 seconds...";
    echo '<meta http-equiv="refresh" content="3;url=cart.php" />';
?>