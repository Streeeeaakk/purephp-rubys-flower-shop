<?php
    session_start();

    include("connection.php");
    include("functions.php");
    set_error_handler(function($errno, $error){
        return str_starts_with($error, 'Undefined array key');
    }, E_WARNING);


        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
            //$user_password = md5($user_password);
			$user_fname = $_POST['user_fname'];
			$user_lname = $_POST['user_lname'];
			$user_MI = $_POST['user_MI'];
			$user_gender = $_POST['user_gender'];
			$user_phonenumber = $_POST['user_phonenumber'];
			$user_birthdate = $_POST['user_birthdate'];

            if(!empty($user_email) && !empty($user_password) && !is_numeric($user_email)){

                //read to database
                $query = "select * from user where user_email = '$user_email' limit 1";

                $result = mysqli_query($con, $query);

                    if($result){
                        if($result && mysqli_num_rows($result) > 0){
                            $user_data = mysqli_fetch_assoc($result);

                            if($user_data['user_password'] === $user_password){
                                $id = $_SESSION['user_email'] = $user_data['user_email'];

                                header("Location: index.php");
                                die;
                            }
                        }
                    }
                    
                    header("Location:login.php?msg=failed");
                    
                
            }
            else{
                echo "Please enter some valid information";
            }
        }

        if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
            echo "Wrong Credentials try again";
        }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!-- fontawesome cdn -->
        <script src="https://kit.fontawesome.com/d9e4522faa.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- custom css -->
        <link rel = "stylesheet" href = "css/style.css">
    </head>
    <body>
        
        <div class="container">

            <div class="login-left">
                
                <div class="login-header">
                    
                    <h1 class="pb-3" >Account Login</h1>

                </div>
                

                
                <form class="login-form" method="POST">
                    
                    <div class="login-form-content">
                        <form action="validation.php" method="post">
                            <div class="form-item">
                                <label for="user_email">Enter Email</label>
                                <input type="text" id="email" name="user_email">
                            </div>

                            <div class="form-item">
                                <label for="user_password">Enter Password</label>
                                <input type="password" id="password" name="user_password">
                            </div>
                        </form>
                        

                        <div class="form-item">
                            <div class="checkbox">
                                <input type="checkbox" id="rememberMeCheckbox" checked>
                                <label for="rememberMeCheckbox" id="checkboxLabel">Remember Me</label>
                            </div>
                        </div>
                        <button type ="submit" value="login" class="btnLogin btn btn-primary"> Login </button>

                        <form action="signup.php" class="login-form-content" >
                            <button type ="submit" class="btn btn-primary" action="signup.php"> Register </button>
                        </form>

                    </div>
                        
                            
                </form>
                
            </div>

            <div class="login-right">
                <div class="d-flex align-items-center">
                    <img class="d-flex justify-content-center px-5" src="images/rubylogo.png" width="100%">
                </div>
                
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