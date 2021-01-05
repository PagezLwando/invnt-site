<?php include ('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>INVNT | Sys</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/favicon.ico"/>
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/styls.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
    .header {
        width: auto;
        margin: 50px auto 0px;
        color: white;
        background: #5F9EA0;
        text-align: center;
        border: 1px solid #B0C4DE;
        border-bottom: none;
        border-radius: 10px 10px 0px 0px;
        padding: 20px;
      }
  </style>
</head>
  <script>
    // When the user clicks on div, open the popup
    function myFunction() {
      alert("You are NOT Admin.. Please log in as Admin");
    }
  </script>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<div class="jumbotron text-center">
  <h1>INVNT-CPT</h1>
</div>

<!-- Container (navbar Section) -->
<div class="nav-responsive">
  <nav class="navbar navbar-expand-lg navbar-light bg-light container" style="font-size: 12px;">
    <div class="collapse navbar-collapse">
      <a class="navbar-brand disable" href="index.php">INVNT-CPT</a>
      <ul class="navbar-nav nav-tabs mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="login.php">LOG IN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php" onclick="myFunction()">REGISTER</a>
        </li>
      </ul>
    </div>
  </nav>
</div>

<div class="jumbotron container">
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
      <div class="header">
        <h1 class="text-center">Welcome to INVNT System</h1>
      </div>
      <div class="error" style="font-size: 14px; color: red;">
            <!-- Display validation errors here -->
            <?php include ('errors.php'); ?>
            <br>
          </div>
          <?php if (isset($_SESSION['message'])): ?>
          <div class="msg">
            <?php 
              //echo $_SESSION['success'];
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            ?>
          </div>
          <?php endif ?>
          <hr>
      <div class="row">
        <div class="col-sm-6">
          <a class="btn btn-outline-success btn-lg btn-block" role="button" href="login.php">Login</a>
        </div> 
        <div class="col-sm-6">
          <a class="btn btn-outline-danger btn-lg btn-block" role="button" href="login.php" onclick="myFunction()">Signup</a>
        </div>
      </div>
    </div>
    <div class="col-sm-4">

  </div>
</div>
</div>
</div>

  <!-- Footer -->
     <footer class="footer container text-center shadow-lg p-3 mb-5 bg-white rounded">
      <a href="#myPage" title="To Top">
        <span class="roundchervon glyphicon glyphicon-chevron-up"></span>
      </a>
      <div align="left">
          <span align="left">invnt &copy 2011.</span><br>
          <span><a href="#">Privacy Policy</a> | <a href="#">Terms of use</a></span>
      </div>
    <div align="right">
      <a href="#"><span class="fa fa-twitter-square" style="font-size:24px;"></span></a>
          <a href="#"><span class="fa fa-facebook-square" style="font-size:24px"></span></a>
          <a href="#"><span class="fa fa-pinterest-square" style="font-size:24px"></span></a>
          <a href=""><span class="fa fa-youtube-square" style="font-size:24px"></span></a>
          <a href="#"><span class="fa fa-instagram" style="font-size:24px"></span></a>
    </div>
  </footer>
  <br>
</body>
</html>