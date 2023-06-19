<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    include("header.php");
    

?>

<p>&nbsp</p>
<p>&nbsp</p>
<?php

    if(isset($_POST['product'])) {
        $id = $_POST['product'];
        $tmpID = $user_data['user_ID'];
    
        echo "You chose the following order(s): <br>";
        
        $del_sql = "DELETE FROM tmp_cart";

        $prod_total = 0.00;
        
        foreach ($id as $product_ID){   
            
        
            $sql = "SELECT * FROM cart where prod_ID = '$product_ID' AND user_ID ='$tmpID'";
            mysqli_query($con, $sql);
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);


            $sql2 = "SELECT * FROM product where prod_ID = '$product_ID'";
            mysqli_query($con, $sql2);
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_array($result2);
            
            $cart_ID = $row['cart_ID'];
            $cart_prod_ID = $row['prod_ID'];
            $prod_quantity = $row['prod_quantity'];
            $prod_image = $row2['prod_picture'];
            $prod_name = $row2['prod_name'];
            $prod_price= $row2['prod_price'];

            $prod_tmpTotal = 0.00;
            $prod_tmpTotal = $prod_price * $prod_quantity;

            $prod_total = $prod_tmpTotal + $prod_total;
            echo "<img src='images/products/$prod_image' width='200px' height='200px'>","'",$prod_name,"'", "= ₱", $prod_tmpTotal."<br />";




        }
        
        echo "With a total of = ₱" , $prod_total;
    }
    
    else {
    
    echo "You did not choose a color.";
    
    }
    
?>
<script>
    function openForm(){
        document.getElementById("popupForm").style.display = "block";

        document.getElementById("disable").style.filter = "brightness(70%)";
        document.getElementById("disable").style.pointerEvents = "none";
    }

    function closeForm(){
        location.reload();
    }

    function price() {
        var x = document.getElementById("payment").value;

        if(x == "gcash"){
            document.getElementById("value").innerHTML = `
            <p>&nbsp</p>
            <h3>Please Transfer to...</h3>
            <h5>BABY CLEAR A. JONG</h5>
            <h5>09168565363</h5>
            `;
        }
        else if(x == "bpi"){
            document.getElementById("value").innerHTML = `
            <p>&nbsp</p>
            <h3>Please Transfer to...</h3>
            <h5>BABY CLEAR A. JONG</h5>
            <h5>1059379476</h5>
            `;
        }
        else if(x == "paypal"){
            document.getElementById("value").innerHTML =`
            <p>&nbsp</p>
            <h3>Please Transfer to...</h3>
            <h5>babyclearjong@gmail.com </h5>
            `;
        }
        else{
            document.getElementById("value").innerHTML = `
            <p>&nbsp</p>
            <h3>Select Option</h3>
            <p>&nbsp</p>
            `;
        }
    }
</script>

<div class="loginpopup">
    <div class="formPopup" id="popupForm">
        <form class="formContainer" action="placeorder.php" method="POST" enctype="multipart/form-data">

                        <div class="form-item">
                            <h5>Mode of Payment</h5>

                            <select name="payment" id="payment" onchange="price()"required>
                                <option value = ''>Select Mode of Payment</option>
                                <option value = 'gcash'>Gcash</option>
                                <option value = 'bpi'>BPI Bank Transfer</option>
                                <option value = 'paypal'>Paypal</option>
                            </select>

                            

                            <span id="value"></span>    
                        </div>

                        <p>&nbsp</p>

                        <select class=' text-center' id='address' name='address' required>
                            <option value =''>Select Address</option>
                            <?php
                                $user_ID = $user_data['user_ID'];
                                
                                $random = rand();

                                if(isset($_POST['product'])) {
                                    $id = $_POST['product'];
                                    $tmpID = $user_data['user_ID'];

                                   
                                    
                                    foreach ($id as $product_ID){   
                                        $sql = "SELECT * FROM cart where prod_ID = '$product_ID' AND user_ID ='$tmpID'";
                                        mysqli_query($con, $sql);
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($result);
    
                                        $cart_ID = $row['cart_ID'];
                                        $prod_quantity = $row['prod_quantity'];
                                        $ins_sql = "INSERT INTO tmp_cart(cart_ID, prod_ID, prod_quantity, user_ID, tmp_cart_rand) values ('$cart_ID', '$product_ID', '$prod_quantity', '$tmpID', '$random')";
                                        mysqli_query($con,$ins_sql);
                                    }
                                }

                                $sql = "SELECT * FROM user_address WHERE user_ID = '$user_ID'";

                                mysqli_query($con, $sql);
                                $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                    
                                        echo "<option value = {$row['address_ID']}>";
                                        echo $row['address_street'], ", ", $row['address_barangay'], ", ...";
                                        echo"</option>";
                                    }
                                
                                echo "<input type='number' name='tmp_cart_rand' hidden id='tmp_cart_rand' value='$random'>";
                            ?>
                        </select>
                        <p>&nbsp</p>

                        <div class="form-item">
                            <input type="file" name="choosefile" id="choosefile" required/>
                        </div>

                        <div class="btn-group">
                                <input type ="submit" class="btn" value="Save" name="create"/>
                                <button type="button" class="openButton btn" onclick="closeForm()" >Cancel</button>
                        </div>
        </form>

    </div> 
</div>

<button onclick='openForm()'>Place Order</button>

<?php
    include('footer.php');
?>