<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
            $user_password = md5($user_password);
			$user_fname = $_POST['user_fname'];
			$user_lname = $_POST['user_lname'];
			$user_MI = $_POST['user_MI'];
			$user_gender = $_POST['user_gender'];
			$user_phonenumber = $_POST['user_phonenumber'];
			$user_birthdate = $_POST['user_birthdate'];

        if(!empty($user_email) && !empty($user_password) && !is_numeric($user_email)){
            //save to database


            $s = "select * from user where user_email = '$user_email'";
            $result = mysqli_query($con, $s);
            $num = mysqli_num_rows($result);

            if($num == 1){
                echo "Email is already in use";
            }
            else{
                $query = "insert into user (user_level, user_email, user_password, user_fname, user_lname, user_MI, user_gender, user_phonenumber, user_birthdate) 
                values ('1','$user_email', '$user_password', '$user_fname', '$user_lname', '$user_MI', '$user_gender', '$user_phonenumber', '$user_birthdate')";
                mysqli_query($con, $query);
                header("Location: login.php");
                die;
            }

        }
        else{
            echo "Please enter some valid information";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create New Account</title>
        <!-- fontawesome cdn -->
        <script src="https://kit.fontawesome.com/d9e4522faa.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- custom css -->
        <link rel = "stylesheet" href = "css/style.css">
    </head>
    <body>

        <div class="container">

            <div class="login-left pb-5">
                
                <div class="login-header">
                    <img src="images/LogoWName.png" width="500">
                    <h1>Create New Account</h1>
                    <p></p>
                </div>
                

                
                <form class="login-form" method="POST">
                        <div class="login-form-content pb-5">

                        <div class="form-item">
                            <label for="user_email">Email Address</label>
                            <input type="text" name="user_email" placeholder="Email Address" id="user_email" required>
                        </div>

                        <div class="form-item">
                            <label for="user_password">Password</label>
                            <input type="password" name="user_password" placeholder="Password" id="user_password" required>
                        </div>
                        
                        <div class="form-item">
                            <label for="user_fname">First Name</label>
                            <input type="text" name="user_fname" placeholder="First Name" id="user_fname" required>
                        </div>

                        <div class="form-item">
                            <label for="user_lname">Last Name</label>
                            <input type="text" name="user_lname" placeholder="Last Name" id="user_lname" required>
                        </div>

                        <div class="form-item">
                            <label for="user_MI">Middle Initial</label>
                            <input type="text" name="user_MI" placeholder="Middle Initial" id="user_MI" required>
                        </div>

                        <div class="form-item">
                                <label for="user_gender" class="form-item"> Gender</label>
                                <select name="user_gender" id="user_gender" required>
                                    <option value="">Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>

                        </div>
                        <div class="form-item">
                            <label for="user_phonenumber">Mobile Number</label>
                            <input type="text" name="user_phonenumber" placeholder="Mobile Number" id="user_phonenumber" required>
                        </div>

                        <div class="form-item mb-3">
                            <label for="user_birthdate">Birthdate</label>
                            <input type="date" id="user_birthdate" name="user_birthdate" required>
                        </div>


                        <input type ="submit" class="btn btn-primary" value="Signup" name="create" required>

                        </div>
                </form>
                
            </div>

            <div class="login-right">
                <img class="login-right-img" src="images/BBQMan.png">
            </div>
        </div>
    
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