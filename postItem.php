<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id = $_SESSION['id'];
    
}

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$item_desc = $_POST['item_desc'];
$item_name = $_POST['item_name'];
$img_path = basename( $_FILES["fileToUpload"]["name"]);
$item_owner = rand(2,8);
$item_id = rand(2,8);
        




// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
// get all details about the post
    
    
    $sql = "INSERT INTO items (item_name, item_owner, item_desc, img_path) " 
            . "VALUES ('$item_name','$item_owner','$item_desc','$img_path')";

    

      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && $mysqli->query($sql)) {
        if($_POST) {
                $data = $_POST['tags'];
                $tags = explode(",", $data);
                $snap = 6;

                for($x = 0; $x < count($tags); $x++) {
                 $sql = "INSERT INTO tags (tag_id, tag, snap_id) VALUES ('', '" . $tags[$x] . "', '$snap')";
                 $mysqli->query($sql);
                  }
                }
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header("location: profile.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>