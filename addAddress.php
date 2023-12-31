<?php

    session_start();
    include('connection.php');
    include('functions.php');

    $user_data = check_login($con);
    include('header.php');

?>


<div class="container">

    <div class="login-left pb-5">
        
                <section id = "special" class = "pt-5">
                    <div class = "container">
                        <div class = "title text-center pt-5">
                            <h2 class = "position-relative d-inline-block">Add Address</h2>
                            <p>&nbsp</p>
                        </div>
                        
                    </div>
                </section>
        

        <div class="formContainer rounded-5">

            <form class="formContainer" action="saveAddress.php" method="POST"  enctype='multipart/form-data'>
                        <div class="login-form-content pb-2">

                            <?php
                                echo"<div class='form-item'>
                                    <input type='text' hidden name='user_ID' placeholder='User ID' id='user_ID' value='{$user_data['user_ID']}'>
                                </div>";
                            ?>

                            <div class="form-item">
                                <input type="text" name="address_street" placeholder="Street" id="address_street"  required>
                            </div>
                            
                            <div class="form-item">
                                <input type="text" name="address_barangay" placeholder="Barangay" id="address_barangay" required>
                            </div>

                            <div class="form-item">
                                <input type="text" name="address_city" placeholder="City or Municipality" id="address_city" required>
                            </div>

                            <div class="form-item">
                                <input type="text" name="address_province" placeholder="Province" id="address_province" required>
                            </div>

                            <div class="form-item">
                                <input type="number" name="address_zipcode" placeholder="Zip Code" id="address_zipcode" required>
                            </div>

                            <div class="form-item">
                                <input type="text" name="address_country" placeholder="Country" id="address_country" required>
                            </div>


                            <input type ="submit" class="btn btn-primary" value="Save Address" name="create">
                            
                            
                            
                        </div>
                        
                </form>
                <div class="formContainer">
                <a href="profile.php" class="mw-30">
                        <button class="btn btn-primary mw-30">Cancel</button>
                    </a>
                </div>
                    
                    

        </div>
        

    </div>

</div>
<?php
    include('footer.php');
?>