<?php
include('connection.php');
include('functions.php');

$user_ID = $_POST['user_ID'];

    $target_dir = "images/profile/";
    $target_file = $target_dir . basename($_FILES["choosefile"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["choosefile"]["tmp_name"], $target_file)) {

            $image=basename( $_FILES["choosefile"]["name"]);

            $sql = "DELETE FROM profilepicture WHERE user_ID = '$user_ID'";
            mysqli_query($con, $sql);

            $query = "insert into profilepicture (user_ID, profile_picture) 
            values ('$user_ID', '$image')";
            mysqli_query($con, $query);

            
            echo "The file '". basename( $_FILES["choosefile"]["name"]). "' has been uploaded. Redirecting in 3 seconds";
            echo '<meta http-equiv="refresh" content="3;url=profile.php" />';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

?>