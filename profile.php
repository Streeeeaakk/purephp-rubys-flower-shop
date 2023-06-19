<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    include("header.php");
    
    
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

</script>
<link rel = "stylesheet" href = "css/profile.css">
<div class="loginpopup">
    <div class="formPopup" id="popupForm">
        <form class="formContainer" action="saveprofile.php" method="POST" enctype="multipart/form-data">
                        
                        <?php
                            $user_ID = $user_data['user_ID'];
                            $sql = "SELECT * FROM profilePicture where user_ID = '$user_ID'";
                            mysqli_query($con, $sql);

                            $result = mysqli_query($con, $sql);
                            $num = mysqli_num_rows($result);
                            $row = mysqli_fetch_array($result);

                            echo"<input name='user_ID' hidden id='user_ID' value='$user_ID' type='number'>";
                            if($num >= 1){
                                echo "<div class='form-item'>
                                    <img src='images/profile/{$row['profile_picture']}' class='rounded-circle clickable' width='280'>
                                </div>";
                            }
                            else{
                                echo"
                                <div class='form-item'>
                                    <img src='images/profile.png' class='rounded-circle clickable' width='280'>
                                </div>";
                            }
                        ?>
                        <p>&nbsp</p>
                        
                        <div class="form-item">
                            <label for="choosefile" class="btn">Select Image</label>
                            <input type="file" hidden name="choosefile" id="choosefile" required/>
                        </div>

                        <div class="btn-group">
                                <input type ="submit" class="btn" value="Save" name="create"/>
                                <button type="button" class="openButton btn" onclick="closeForm()" >Cancel</button>
                        </div>
    </form>

    </div> 
</div>

    
    <!-- profile -->
    <section id = "special" class = "pt-5">
        <div class = "container">
            <div class = "title text-center pt-5">
                <h2 class = "position-relative d-inline-block">My Account</h2>
            </div>
        </div>
    </section>

    <div class = "row  px-5 py-5 "  id="disable">
        <div class="col-md-4 mt-1">
            <div class="card text-center sidebar">
                <p>&nbsp</p>
                <div class="card-body">
                    
                    
                    <?php  

                        $user_ID = $user_data['user_ID'];
                        $sql = "SELECT * FROM profilePicture where user_ID = '$user_ID'";
                        mysqli_query($con, $sql);
                        $result = mysqli_query($con, $sql);
                        
                        $row = mysqli_fetch_array($result);
                        $num = mysqli_num_rows($result);

                            if($num >= 1){
                                echo "<img src='images/profile/{$row['profile_picture']}' class='rounded-circle clickable' width='280'  onclick='openForm()' />";
                            }
                            else{
                                echo"<img src='images/profile.png' class='rounded-circle clickable' width='280' onclick='openForm()'>";
                            }
                        
                    ?> 

                    <div class="mt-3">
                        <?php echo $user_data['user_fname'], " " , $user_data['user_lname'] ?>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-8 mt-1">
            <div class="card mb-3 pt-3">
                <div class="px-4 py-3">
                <h1 class="m-3 pt-3">About</h1>
                <div class="row">
                    <div class="col-md-3 px-4">
                        <h5>Full Name</h5>
                    </div>
                    <div class="col-md-9 text-secondary">
                        <?php echo $user_data['user_fname'], " " , $user_data['user_lname'] ?>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 px-4">
                            <h5>Birthdate</h5>
                        </div>
                        
                        <div class="col-md text-secondary">
                            <?php echo "&nbsp" , $user_data['user_birthdate']?>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 px-4">
                            <h5>Email</h5>
                        </div>
                        <div class="col-md-9 text-secondary">
                            <?php echo "&nbsp" , $user_data['user_email']?>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 px-4">
                            <h5>Phone</h5>
                        </div>
                        
                        <div class="col-md text-secondary">
                            <?php echo "&nbsp" , $user_data['user_phonenumber']?>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3 px-4">
                            <h5>Address</h5>
                            <?php
                            $user_id = $user_data['user_ID'];   
                            echo "<div class='pt-2'><a href='addAddress.php?user_ID=$user_id'>
                            <button class='btnaddress'>Add Address</button>
                            </a></div>"
                            ?>
                        </div>
                        
                                <div class="col-md-9 text-secondary">
                                    
                                    <select>
                                        <?php
                                            $user_ID = $user_data['user_ID'];
                                            $sql = "SELECT * FROM user_address WHERE user_ID = '$user_ID'";

                                            mysqli_query($con, $sql);
                                            $result = mysqli_query($con, $sql);
                                                while($row = mysqli_fetch_array($result)){
                                                
                                                    echo "<option value = {$row['address_ID']}>";
                                                    echo $row['address_street'], ", ", $row['address_barangay'], ", ", $row['address_city'], ", ...";
                                                    echo"</option>";
                                                }
                                                
                                        
                                        ?>
                                    </select>
                                        
                                        <p></p>
                                </div>
                    </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- end of profile -->

    
 <?php

include('footer.php');

?>