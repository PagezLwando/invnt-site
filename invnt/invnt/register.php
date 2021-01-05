<?php include ('server.php');
  if (!isset($_SESSION['email']))
  {
    $_SESSION['message'] = "Contact admin...!";
    header('location: index.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>INVNT | Register</title>
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
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div class="jumbotron text-center">
      <h1>INVNT-CPT</h1>
      <!-- logged in user information -->
      <?php  if (isset($_SESSION['email'])) : ?>
        <strong><?php echo $_SESSION['email'];?></strong>
      <?php endif ?>
    </div>

    <!-- Container (Navbar Section) -->
    <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light container" style="font-size: 12px;">
        <div class="collapse navbar-collapse">
          <a class="navbar-brand disable" href="dashboard.php">INVNT-CPT</a>
          <ul class="navbar-nav nav-tabs mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">ALL CLIENTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">ALL AGENTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="register.php">REGISTER USERS</a>
            </li><li class="nav-item">
              <a class="nav-link" href="#">EDIT USERS</a>
            </li>
          </ul>
          <a href="logout.php?logout='1'"><button class="btn btn-outline-danger my-2 my-sm-0 btn-sm">Logout</button></a>
        </div>
      </nav>
    </div>

    <!-- Container (register Section) -->
    <div class="jumbotron container">
    <div id="about" class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          
        </div>
        <div class="col-sm-4 shadow-lg p-3 mb-5 bg-white rounded">
          <h5 class="text-center header"> Create an Account </h5>
            <form method="post" action="register.php" class="form-group">
              <?php echo $message; ?>
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
              <div class="form-group">
                <select class="custom-select mr-sm-2" name="role" required>
                    <option value="0">Choose user...</option>
                    <option value="admin">Admin</option>
                    <option value="agent">Agent</option> 
                  </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Name: " autocomplete="" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control"  name="surname" placeholder="Enter Surname: " autocomplete="" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="cell_number" placeholder="Enter Cell Number: " autocomplete="" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="id_number" placeholder="Enter ID Number: " autocomplete="" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Enter Email Address: " autocomplete="" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Enter Password: " autocomplete="" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password: " autocomplete="" required>
              </div>
              <div class="form-group">
                <label for="disabledSelect">Already a member? <a href="login.php">Sign in</a></label>
              </div>

          <button type="submit" name="register_user" class="btn btn-outline-success">Submit</button>
          <button type="reset" name="Cancel" class="btn btn-outline-danger">Cancel</button>
        </form>
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