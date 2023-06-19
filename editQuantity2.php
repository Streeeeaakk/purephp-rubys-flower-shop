
<style>
    #editpopupForm{
        display: block;
    }
</style>

<?php
session_start();
include('connection.php');
include('functions.php');
$user_data = check_login($con);
include('header.php');

$prod_ID = $_GET['prod_ID'];
$cart_ID = $_GET['cart_ID'];
$user_ID = $_GET['user_ID'];
$prod_quantity = $_GET['prod_quantity'];


echo"
    <div class='loginpopup'>
        <div class='formPopup' id='editpopupForm'>
            <form class='formContainer' action='addtocart2.php' method='POST' enctype='multipart/form-data'>
                            <div class='form-item'>";
                            echo "<input type='number' hidden name='prod_ID' placeholder='Product ID' id='prod_ID' value='{$prod_ID}'>";
                            echo "<input type='number' hidden  name='cart_ID' placeholder='Product ID' id='cart_ID' value='{$cart_ID}'>";
                            echo "<input type='number' hidden name='user_ID' placeholder='USER ID' id='user_ID' value='{$user_ID}'>";
                            echo "</div>
                            <div class='form-item'>
                                <input name='prod_quantity' placeholder='Quantity' id='prod_quantity' type='number' value='{$prod_quantity}' required>
                            </div><p>&nbsp</p>
                <input type ='submit' class='btn btn-primary' value='Add to Cart' name='create'/>
                <a href ='index.php'><button type='button' class='openButton btn btn-primnary'>Cancel</button></a>
        </form>

        </div> 
    </div>";


?>
<footer class = "py-5">
       
    </footer>
    <!-- end of footer -->




    <!-- jquery -->
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
</body>
</html>