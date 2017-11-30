<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>



<link rel="stylesheet" type="text/css" href="css/masonry.css">
  <title>Sign-Up/Login Form</title>
  <?php include 'css/css.html'; ?>
  <lin
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>

    <nav class="row navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">login <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="public_profile.php">home</a>
          </li>

                  
        </ul>
        
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Spare parts shop</h1>
        
      </div>

      <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Welcome </h1>
          
          <form class="sm-div" action="index.php" method="post" autocomplete="off">
          <div class="form-group">
              <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input class="form-control" type="email" required autocomplete="off" name="email"/>
            </div>
          </div>
          <div class="form-group">
          
          <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input class="form-control" type="password" required autocomplete="off" name="password"/>
            </div>
          </div>
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
          <button class="btn btn-primary" name="login" />Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h2>Sign Up</h2>
          
          <form class="sm-div" action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="form-group">
              <div class="field-wrap">
                <label>
                  First Name<span class="req">*</span>
                </label>
                <input class="form-control" type="text" required autocomplete="off" name='firstname' />
              </div>
            </div>
            <div class="form-group">
              <div class="field-wrap">
                <label>
                  Last Name<span class="req">*</span>
                </label>
                <input class="form-control" type="text"required autocomplete="off" name='lastname' />
              </div>
            </div>
          </div>
          <div class="form-group">
              <div class="field-wrap">
                <label>
                  Email Address<span class="req">*</span>
                </label>
                <input class="form-control" type="email"required autocomplete="off" name='email' />
              </div>
            </div>
          
          <div class="form-group">
            <div class="field-wrap">
              <label>
                Set A Password<span class="req">*</span>
              </label>
              <input class="form-control" type="password"required autocomplete="off" name='password'/>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary" name="register" />Register</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

    </main><!-- /.container -->


   
  


  

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>

</body>
</html>
