<?php

session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

if(!($user_data['user_level']) == 0){
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome cdn -->
    <script src="https://kit.fontawesome.com/d9e4522faa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
    
   

<?php
include('header.php');
$id = $_GET['id'];

$sql = "select * from product where prod_ID = '$id'";
$r = mysqli_query($con, $sql);

$row = mysqli_fetch_array( $r );
    $id = $row['prod_ID'];
    $category = $row['prod_category'];
    $name = $row['prod_name'];
    $price = $row['prod_price'];
    $details = $row['prod_details'];
    $image = $row['prod_picture'];

    echo
                '<div class="container pt-5">
                    <div class="container pt-5" id="">';
                    echo '<div class="formContainer rounded-5">';
                        echo "<form action='editSave.php?' method='GET' enctype='multipart/form-data'>";
                        echo '<link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">';
                            echo '<link rel = "stylesheet" href = "css/main.css">';
                                
                                        echo '<div class="form-item" id="form_id">';
                                        echo "<input type='text' hidden name='prod_ID' placeholder='Product ID' id='prod_ID' value='{$id}'>";
                                        echo '</div>';
                                        
                                        echo '<div class="form-item text-center">
                                                <label for="prod_category" class="form-item"> Select Category</label>
                                                <select name="prod_category" id="prod_category" required>
                                                    <option value="">Select Category...</option>
                                                    <option value="flower">Flower Bouquet</option>
                                                    <option value="sunflower">Sunflower Bouquet</option>
                                                    <option value="chocolate">Chocolate Bouquet</option>
                                                    <option value="additionals">Additionals</option>
                                                </select>';
                                        echo '</div>';

                                        echo '<div class="form-item rounded-5">';
                                        echo '<p class="px-2">Product Name</p>';
                                        echo "<input class=' rounded-5' type='text' name='prod_name' placeholder='Product Name' id='prod_name' value='{$name}'>";
                                        echo '</div>';
                                        echo '<div class="form-item">';
                                        echo '<p class="px-2">Product Price</p>';
                                        echo "<input class=' rounded-5' type='text' name='prod_price' placeholder='Product Price' id='prod_name' value='{$price}'>";
                                        echo '</div>';
                                        
                                        echo "<div>";
                                        echo '<p class="px-2">Details</p>';
                                        echo '<div class="d-flex justify-content-center">';
                                        echo "<textarea rows = '4' cols = '150' name ='prod_details' id='prod_details'>{$details}</textarea></div>";
                                        echo '</div>';  
                                        echo "<div class='d-flex justify-content-center'>
                                        <img class='px-5 py-3 rounded-5' src = 'images/products/{$row['prod_picture']}' width='500'>
                                        </div>";
                                        echo "<input type ='submit' class='btn btn-primary' value='Submit Value'/>
                                        <a href='addproducts.php'><button type='button' class='openButton btn btn-primary'>Cancel</button></a>
                                         </form>";
                                         
                                        echo "</div>";
                                        
                        
                           
                              
                    
                    echo'</div>';
                    echo'</div>'; 
                echo'</div>';



include('footer.php');
?>


