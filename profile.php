<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';

//require 'myItems.php';
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
<html >
<head>
  <meta charset="UTF-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/styl.css">
  <link rel="stylesheet" type="text/css" href="css/masonry.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />


  <title>Welcome <?= $first_name.' '.$last_name ?></title>

  <?php include 'css/css.html'; ?>
</head>
<?php  
if (isset($_POST['submit'])) { //user logging in

        require 'postItem.php';
        
    }
?>
<body class="">
<div class="form">

          
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
         
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>
          
          
          
          
          

   </div>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h3 class="display-3">Hello, <?php echo $first_name.' '.$last_name; ?></h3>
          <p><?= $email ?></p>
          <p><?= $id ?></p>
          <p>Sparepart.co.ke is an upcoming parts exchange platform signup to be part of the community and trade goods .</p>
         
        <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
            Post an Item
          </button>

          <!-- Modal -->
          
                      
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Post an Item that you want to trade</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="postItem.php" method="post" enctype="multipart/form-data">
                          <div class="field-wrap">
                            <br>
                            <label>
                              item name<span class="req">*</span>
                            </label>
                            <br>
                            <input type="text" required autocomplete="off" name="item_name" />
                          </div>
                          <div class="field-wrap">
                            <br>
                            <label>
                              Item description<span class="req">*</span>
                            </label>
                            <br>
                            <input type="text" required autocomplete="off" name="item_desc" />
                          </div>
                          <div class="field-wrap">
                            <br>
                            <label>
                              Enter keywords that describe the item<span class="req">*</span>
                            </label>
                            <br>
                            <div id="myDIV" class="header">
                                 <input type="text" id="myInput" placeholder="Title...">
                              <span onclick="newElement()" class="addBtn">Add</span>
                            </div>

                            <ul id="myUL">
                              
                            </ul>
                          </div>
                          <br>
                          <label>
                              Select image to upload:<span class="req">*</span>
                            </label>
                            <br>
                          
                          <input type="file" name="fileToUpload" id="fileToUpload">
                          <input class="btn btn-secondary" type="submit" value="Upload Image" name="submit">
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary" type="submit" name="postItem">Post</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          
        </div>
      </div>

      <div class="container">
        
        <div class="row" id="itemView">
           <div class="container">
             <br />
             <h2 align="center">Use keywords to search available items</h2><br />
             <div class="form-group">
              <div class="input-group">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
               <input type="text" name="search_text" id="search_text" placeholder="Search any item" class="form-control mr-sm-2" />
              </div>
             </div>
             <br />
             <div id="result"></div>
            </div>
          
          
    
          
        </div>

        <hr>

      </div> <!-- /container -->

    </main>

    <footer class="container">
      <p>spareparts.co.ke</p>
    </footer>
</body>
<script src="js/index.js"></script>
</html>