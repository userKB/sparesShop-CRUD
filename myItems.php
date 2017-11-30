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

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
 <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 
  <link rel="stylesheet" type="text/css" href="css/masonry.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

<body>
    <?php include 'css/css.html'; ?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="profile.php">Home <span class="sr-only">(current)</span></a>
          </li>
          
          <li class="nav-item">
            <a href="logout.php" class="nav-link" name="logout"/>Log Out</a>
          </li>
          <li class="nav-item">
            <a href="myItems.php" class="nav-link" name="logout"/>my collection</a>
          </li>
          
        </ul>
        
      </div>
</nav>
<div class="container masonry">


<?php
    $id = $_SESSION['id'];
$result = $mysqli->query("SELECT * FROM items WHERE item_owner='$id'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "you have no items";
    
}
else { // item exists
   
  while($row = mysqli_fetch_array($result))
                 {
                  $output .= '
                   <div class ="item">
  
                    <img height="200" width="160"src="img/'.$row['img_path'].'">
                    <br>'.$row["item_name"].'<br>
                    '.$row["item_desc"].'<br>
                    owner:&nbsp;'.$row["item_owner"].'<br>
                    <button value="'.$row["item_id"].'" class="btn btn-secondary item_exch" onclick="myfunction(this.value)">exchange</button></br>
                  </div>
                  ';
                  }
 echo $output;
}


    $item = $result->fetch_assoc();
    $item_name = $item['item_name'];
    $item_desc= $item['item_desc'];
    $item_owner =$item['item_owner'];
    $img_path =$item['img_path'];

?> 
</div>
</body>
</html>


