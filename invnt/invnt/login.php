<?php include ('server.php'); 
  //login.php
  include ('connect.php');
  $message = '';
  if (isset($_POST["login_user"]))
  {
    $role = $_POST["role"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ( empty($_POST["role"]) || empty($_POST["email"]) ||  empty($_POST["password"]))
    {

      if (empty($_POST["role"])) {
        # code...
        $message = '<label> Role are required </label>';
      }
      elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        # code...
        $message = '<label> Invalid email format </label>';
      }
      elseif (!strlen($_POST["password"]) > 6) {
        # code...
        $message = '<label> Password must be atleast 6 characters </label>';
      }else
      {
        $message = '<label> Some Fields are required </label>';
      }
    }
    else
    {
      $query = "SELECT * FROM users WHERE role = :role AND email = :email AND password = :password";
      $statement = $connect->prepare($query);
      $statement->execute(array(':role' => $_POST["role"], ':email' => $_POST["email"], ':password' => $_POST['password']));
      $count = $statement->rowCount();
      if ($count > 0)
      {
        $results = $statement->fetchAll();
        foreach ($results as $row)
        {
          if ($_POST['email'] == $row['email'] && $_POST['password'] == $row['password'])
          {
            //if user is admin direct to dashboard else to welcome page
            switch ($_POST['role'])
            {
              case 'admin':
              # code...
              $_SESSION['id'] = $row['id'];
              $_SESSION['email'] = $row['email'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['surname'] = $row['surname'];

              header("location: dashboard.php");
              break;

              case 'agent':
              # code...
              $_SESSION['id'] = $row['id'];
              $_SESSION['email'] = $row['email'];
              header("location: welcome.php");
              break;
             
              default:
              # code...
              $message = '<label>No Role... Please select role</label>';
              break;
            }
          }
          else
          {
            $message = '<label>No user found with this Email</label>';
          }
        }
      }
      else
      {
        $message = '<label>Wrong Email Address or password</label>';
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>INVNT | Log In</title>
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

<!-- Container (About Section) -->
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
<div class="jumbotron container">
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4 shadow-lg p-3 mb-5 bg-white rounded">
      <h5 class="text-center header">Login</h5>
      <?php echo $message; ?>
        <div class="error" style="font-size: 14px; color: red;">
            <!-- Display validation errors here -->
            <?php include ('errors.php'); ?>
            <br>
          </div>
    <form method="post" action="" class="form-group">
      <div class="form-group">
        <label for="role">Role: </label>
        <select class="custom-select mr-sm-2" name="role" id="role" required>
            <option value="0">Choose user...</option>
            <option value="admin">Admin</option>
            <option value="agent">Agent</option> 
          </select>
      </div>
      <div class="form-group">
        <label for="email">Email Address: </label>
        <input type="text" class="form-control" name="email" placeholder="Enter Email Address: " autocomplete="" required>
      </div>
      <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password: " autocomplete="" required>
      </div>

      <div class="form-group">
        <label for="disabledSelect">Not yet a member? <a href="register.php" onclick="myFunction()">Sign Up</a></label>
      </div>

      <button type="submit" name="login_user" class="btn btn-outline-success">Submit</button>
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