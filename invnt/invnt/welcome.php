<?php include ('server.php');
  if (!isset($_SESSION['email']))
  {
    $_SESSION['message'] = "You are not logged in...!";
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>INVNT | Home</title>
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
        Welcome <strong><?php  echo $_SESSION['email'];?></strong>
      <?php endif ?>
    </div>

    <!-- Container (About Section) -->
    <div id="about" class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: 12px;">
        <div class="collapse navbar-collapse">
          <!-- logged in user information -->
          <?php  if (isset($_SESSION['id']) == 'admin') : ?>
            <a class="navbar-brand" href="dashboard.php">INVNT-CPT</a>
          <?php endif ?>
          <ul class="navbar-nav nav-tabs mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">ALL CLIENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ALL AGENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">REGISTER USERS</a>
        </li><li class="nav-item">
          <a class="nav-link active" href="#">HOME PAGE</a>
        </li>
      </ul>

          <a href="logout.php?logout='1'"><button class="btn btn-outline-danger btn-sm">Logout</button></a>
        </div>
      </nav>
        <p>Username: <?php echo $_SESSION['name']; echo " "; echo $_SESSION['surname'];?></p>
        <p>Role: <?php echo $_SESSION['role'];?></p>
      <div id="about" class="container-fluid">
        <div class="row">
          <div class="col-sm-4">

          </div>
          <div class="col-sm-4">
            <form method="post" class="form-group">
              <div class="error" style="font-size: 14px; color: red;">
                <!-- Display validation errors here -->
                <?php include ('errors.php'); ?>
                <br>
              </div>
              <?php if (isset($_SESSION['message'])): ?>
              <div class="msg">
                <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                ?>
              </div>
              <?php endif ?>
             
              <div class="form-group">
                <label for="salary">Campaign Name: </label>
                <select class="custom-select mr-sm-2" name="campaign_name" >
                    <option value="0">Choose...</option>
                    <option value="stdlife">STDLIFE</option>
                    <option value="cartrack">CARTRACK</option> 
                    <option value="kingprice">KINGPRICE</option>
                    <option value="omsti">OMSTI</option>
                    <option value="omlife">OMLIFE</option> 
                    <option value="sanlam">SANLAM</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name: " autocomplete="" >
              </div>
              <div class="form-group">
                <label for="surname">Surname: </label>
                <input type="text" class="form-control"  name="surname" placeholder="Enter Surname: " autocomplete="" >
              </div>
              <div class="form-group">
                <label for="cell_number">Cell Number: </label>
                <input type="text" class="form-control" name="cell_number" placeholder="Enter Cell Number: " autocomplete="" >
              </div>
              <div class="form-group">
                <label for="id_number">ID Number: </label>
                <input type="text" class="form-control" name="id_number" placeholder="Enter ID Number: " autocomplete="" >
              </div>

              <div class="form-group">
                <label for="salary">Salary: </label>
                <select class="custom-select mr-sm-2" name="salary" required>
                    <option value="0">Choose Salary Range...</option>
                    <option value="R 1000 - R4 000">R 1000 - R4 000</option>
                    <option value="R 4000 - R8 000">R 4000 - R8 000</option> 
                    <option value="R 8000 - R16 000">R 8000 - R16 000</option>
                  </select>
              </div>
              <button type="submit" name="submit_lead" class="btn btn-outline-success">Submit</button>
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
      <a href="#myPage" title="To Top"><span class="roundchervon glyphicon glyphicon-chevron-up"></span></a>
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