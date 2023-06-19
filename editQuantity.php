
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

$id = $_GET['id'];
$user_id = $_GET['user_id'];

echo"
    <div class='loginpopup'>
        <div class='formPopup' id='editpopupForm'>
            <form class='formContainer' action='addtocart.php' method='POST' enctype='multipart/form-data'>
                            <div class='form-item'>";
                            echo "<input type='number' hidden name='prod_ID' placeholder='Product ID' id='prod_ID' value='{$id}'>";
                            echo "<input type='number' hidden name='user_ID' placeholder='USER ID' id='user_ID' value='{$user_id}'>";
                            echo "</div>
                            <div class='form-item'>
                                <input name='prod_quantity' placeholder='Quantity' id='prod_quantity' type='number' required>
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