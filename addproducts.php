<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    include("header.php");

    if(!($user_data['user_level']) == 0){
        header("Location: index.php");
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

    function openEditForm(){
        document.getElementById("edtForm").style.display = "block";
    }

</script>

<p>&nbsp</p>
<p>&nbsp</p>
<div class="loginpopup">
    <div class="formPopup" id="popupForm">
        
        <form class="formContainer" action="saveprod.php" method="POST" enctype="multipart/form-data">
                        <div class="form-item">
                                <label for="prod_category" class="form-item"> Select Category</label>
                                <select name="prod_category" id="prod_category" required>
                                    <option value="">Select Category...</option>
                                    <option value="flower">Flower Bouquet</option>
                                    <option value="sunflower">Sunflower Bouquet</option>
                                    <option value="chocolate">Chocolate Bouquet</option>
                                    <option value="additionals">Additionals</option>
                                </select>
                        </div>
                            <div class="form-item">
                                <input type="text" name="prod_name" placeholder="Product Name" id="prod_name" required>
                            </div>
                        <div class="form-item">
                            <input name="prod_price" placeholder="Product Price" id="prod_price" type="number" required>
                        </div>
                        <textarea rows = "4" cols = "40" placeholder="Enter Details Here" name ="prod_details" id="prod_details" required></textarea>
                        <div class="form-item">
                            <input type="file" name="choosefile" id="choosefile" required/>
                        </div>
            <input type ="submit" class="btn btn-primary" value="Save Product" name="create"/>
            <button type="button" class="openButton btn btn-primnary" onclick="closeForm()" >Cancel</button>
        </form>
    
    </div> 
</div>

    

<section id="disable"> 

    


    <h1 class=" text-center py-3">Products</h1>
    
    
    <div class ="openBtn text-center py-3">
            <button type="button" class="openButton btn btn-primnary" onclick="openForm()" >
                Add Product
            </button>
        </div>
    <div class="d-flex justify-content-center">
        <div class="formContainer px-5 py-5 rounded-5">
            <table class="table table-bordered table-sm align-middle text-center bg-white table-hover" id="productTable" >
            
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Details</th>
                    <th scope="col">Product Picture</th>
                    <th scope="col">Product Date Added</th>
                </tr>
            </thead>

            

            <?php
                $query2 = ("SELECT * FROM product ");
                mysqli_query($con, $query2);
                $result = mysqli_query($con, $query2) ;
                
                $total = 0.00;
                while( $row = mysqli_fetch_array( $result ) ){

                    $id = $row['prod_ID'];
                    $category = $row['prod_category'];
                    $name = $row['prod_name'];
                    $price = $row['prod_price'];
                    $details = $row['prod_details'];


                    echo "<tr>
                    
                    <td>{$row['prod_name']}</td>
                    <td>{$row['prod_category']}</td>
                    <td>₱{$row['prod_price']}.00</td>
                    <td>{$row['prod_details']}</td>
                    <td><img src = 'images/products/{$row['prod_picture']}' width='200'  ></td>
                    <td>{$row['prod_dateAdded']}</td>

                    <td>
                    <span class='deleteProd'>
                    <a href='delete.php?id=$id'><button class='btn btn-primary'>Delete</button></a>
                    </span>&nbsp&nbsp&nbsp&nbsp&nbsp
                    <span class='editProd'>

                    <a href='edit.php?id=$id'><button class='btn btn-primary'>Edit</button></a>
                    </span></td>
                    
                    </tr>\n";
                
                }

            ?>

            <?php
                
            ?>
        </table>
        </div>
    </div>
    
    

</section>

<?php
include('footer.php');
?>


