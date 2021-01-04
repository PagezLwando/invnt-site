<?php include ('server.php');

  if (!isset($_SESSION['email']))
  {
    $_SESSION['message'] = "You are not logged in...!";
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>INVNT | Agents</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

  <div class="jumbotron text-center">
    <h1>INVNT-CPT</h1>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['email'])) : ?>
      Welcome <strong><?php echo $_SESSION['email'];?></strong>
    <?php endif ?>
  </div>

  <!-- Container (About Section) -->
  <div id="about" class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="font-size: 12px;">
    <div class="collapse navbar-collapse">
      <a class="navbar-brand" href="dashboard.php">INVNT-CPT</a>
      <ul class="navbar-nav nav-tabs mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="view_all.php">ALL CLIENTS</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="view_agents.php">ALL AGENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">REGISTER USERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="welcome.php">EDIT USERS</a>
        </li>
      </ul>
      <form method="GET" action="" class="form-inline my-2 my-sm-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search users..." aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <a href="logout.php?logout='1'"><button class="btn btn-outline-danger my-2 my-sm-0 btn-sm">Logout</button></a>
    </div>
  </nav>
  <hr>
  <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>
    <?php 
    $query = "SELECT * FROM users";
    $results = mysqli_query($db, $query);
    ?>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Role</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Cell Number</th>
        <th scope="col">ID Number</th>
        <th scope="col">Email</th>
        <th scope="col">Allocate</th>
        <th scope="col">Edit</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['role']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['surname']; ?></td>
        <td><?php echo $row['cell_number']; ?></td>
        <td><?php echo $row['id_number']; ?></td>
        <td><?php echo $row['email']; ?></td>

        <td>
          <a href="view_agents.php?alloc=<?php echo $row['id']; ?>" class="del_btn btn btn-outline-info btn-sm">Allocate</a>
        </td>
        <td>
          <a href="view_agents.php?edit=<?php echo $row['id']; ?>" class="edit_btn btn btn-outline-success btn-sm">Edit</a>
        </td>
        <td>
          <a href="view_agents.php?update=<?php echo $row['id']; ?>" class="upd_btn btn btn-outline-primary btn-sm">Update</a>
        </td>
        <td>
          <a href="view_agents.php?del=<?php echo $row['id']; ?>" class="del_btn btn btn-outline-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
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