<?php include ('server.php');

  if (!isset($_SESSION['email']))
  {
    $_SESSION['message'] = "You are not logged in...!";
    header('location: login.php');
  }else
  {
      include ('connect.php');
      $role = mysqli_escape_string($db, $_POST['role']);
      $email = mysqli_escape_string($db, $_POST["email"]);
      $query = "SELECT * FROM users WHERE role = :role AND email = :email";
      $statement = $connect->prepare($query);
      $statement->execute(array(':role' => $role, ':email' => $email));
      $count = $statement->rowCount();
      if ($count == 1)
      {
        $results = $statement->fetchAll();
        foreach ($results as $row)
        {
          if ($_POST['email'] == $row['email'])
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
              $_SESSION['name'] = $row['name'];
              $_SESSION['surname'] = $row['surname'];
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
            $message = '<label>You do not have permission to this link..!</label>';
          }
        }
      }
      else
      {
        $message = '<label>Something went wrong. Try later..</label>';
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>INVNT | Dashboard</title>
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
      <a class="navbar-brand active" href="dashboard.php">INVNT-CPT</a>
      <ul class="navbar-nav nav-tabs mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="view_all.php">ALL CLIENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_agents.php">ALL AGENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">REGISTER USERS</a>
        </li><li class="nav-item">
          <a class="nav-link" href="welcome.php">EDIT USERS</a>
        </li>
      </ul>
      <form action="" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search users..." aria-label="Search">
        
          <a href="dashboard.php?search=<?php echo $row['id']; ?>"><button type="submit" class="btn my-2 my-sm-0">Search</button></a>
      </form>
      <a href="logout.php?logout='1'"><button class="btn btn-outline-danger btn-sm">Logout</button></a>
    </div>
  </nav>
  <hr>
  <?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
      <?php 
        echo $_SESSION['com_message_pump()']; 
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>
    <?php
    $query = "SELECT * FROM users";
    $results = mysqli_query($db, $query);
    ?>
  <table class="table table-striped " style="overflow-x:auto;">
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
          <a href="#" class="edit_btn btn btn-outline-success btn-sm">Edit</a>
        </td>
        <td>
          <a href="#" class="upd_btn btn btn-outline-primary btn-sm">Update</a>
        </td>
        <td>
          <a href="dashboard.php?del=<?php echo $row['id']; ?>" class="del_btn btn btn-outline-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
    <?php
      if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 10;
      $offset = ($pageno-1) * $no_of_records_per_page;

      $conn=mysqli_connect("localhost","root","","invnt_db");
      // Check connection
      if (mysqli_connect_errno()){
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          die();
      }

      $total_pages_sql = "SELECT COUNT(*) FROM invnt_tbl";
      $result = mysqli_query($conn,$total_pages_sql) or die( mysqli_error($conn));
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);

      $sql = "SELECT * FROM table LIMIT $offset, $no_of_records_per_page";
      $res_data = mysqli_query($conn,$sql) or die( mysqli_error($conn));
      while($row = mysqli_fetch_array($res_data)){
          //here goes the data
        echo $row['name']; 
      }
      mysqli_close($conn);
    ?>
  <ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
  </ul>

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