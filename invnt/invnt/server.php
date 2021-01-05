<?php
	session_start();
	//connect to database
	$db = mysqli_connect('localhost', 'root', '', 'invnt_db');
	$role = "";
	$name = "";
	$surname = "";
	$cell_number = "";
	$id_number = "";
	$email = "";
	$campaign_name = "";
	$salary = "";
	$password = "";
	$confirm_password = "";
	$message = "";
	$id = 0;
	$update = false;
	$errors = array();

	if (isset($_POST['register_user']))
	{
		$role = mysqli_real_escape_string($db, $_POST['role']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$surname = mysqli_real_escape_string($db, $_POST['surname']);
		$cell_number = mysqli_real_escape_string($db, $_POST['cell_number']);
		$id_number = mysqli_real_escape_string($db, $_POST['id_number']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
		
		//ensure that form fields are filled
		if (empty($role)) { array_push($errors, "Role is required"); }

		if (empty($name))
		{
			array_push($errors, "Name is required");
		}else
		{
			$name = mysqli_real_escape_string($db, $_POST['name']);
			// check if name only contains letters and whitespace
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
		    {
		      array_push($errors, "Only letters and white space in Name allowed");
		    }
		}

		if (empty($surname))
		{
			array_push($errors, "Surname is required");
		}else
		{
			$surname = mysqli_real_escape_string($db, $_POST['surname']);
			// check if name only contains letters and whitespace
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$surname))
		    {
		      array_push($errors, "Only letters and white space in Surname allowed");
		    }
		}

		if (empty($cell_number))
		{
			array_push($errors, "Cell Number is required");
		}else
		{
			$cell_number = mysqli_real_escape_string($db, $_POST['cell_number']);
			// check if name only contains letters and whitespace
		    if (preg_match("/^[0-9]*$/",$cell_number))
		    {
		    	if (strlen($cell_number) != 10)
	    		{
	    			array_push($errors, "Only 10 Cell number digits allowed");
	    		}
		    }
		}

		if (empty($id_number))
		{
			array_push($errors, "Id number is required");
		}else
		{
			$id_number = mysqli_real_escape_string($db, $_POST['id_number']);
			// check if name only contains letters and whitespace
		    if (preg_match("/^[0-9]*$/",$id_number))
		    {
		    	if (strlen($id_number) != 13)
	    		{
	    			array_push($errors, "Only 13 Id number digits allowed");
	    		}
		    }
		}
		if (empty($email))
		{
			array_push($errors, "Email is required");
		}else
		{
			$email = mysqli_real_escape_string($db, $_POST['email']);
			//validate email format
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				array_push($errors, "Invalid Email format");
			}
	    }

		if (empty($password))
		{
			array_push($errors, "Password is required");
		}else
		{
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
			//$password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt the password before saving in the database
			if (strlen($password) < 6)
			{
				array_push($errors, "Password must be alteast 6 characters or long");
			}
			if ($password != $confirm_password)
			{
				array_push($errors, "The two passwords do not match");
			}
		}

		//if there are no errors, save user to db
		if (count($errors) == 0)
		{
			$sql = "INSERT INTO users (role, name, surname, cell_number, id_number, email, password) VALUES ('$role', '$name', '$surname', '$cell_number', '$id_number', '$email', '$password')";
			mysqli_query($db, $sql) or die(mysqli_connect_error());
			$_SESSION['role'] = $role;
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $name;
			$_SESSION['surname'] = $surname;
			$_SESSION['message'] = "You are registered...!";
			header('location: dashboard.php'); //redirect to homepage
		}
	}


/*

	//log user in from login page
	if (isset($_POST['login_user']))
	{
		$role = mysqli_escape_string($db, $_POST["role"]);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		//ensure that form fields are filled
		if (empty($role)) { array_push($errors, "Role is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password)){ array_push($errors, "Password is required"); }

		//if no errors query from the database
		if (count($errors) == 0)
		{
			//$password = md5($password); //encrypt password before comparing
			$query = "SELECT * FROM users WHERE role = '$role' AND email ='$email' AND password = '$password'";
			$result = mysqli_query($db, $query);

			if (mysqli_num_rows($result) == 1)
			{
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($result);
				if ($logged_in_user['role'] == 'admin')
				{

					$_SESSION['email'] = $logged_in_user;
					header('location: dashboard.php');		  
				}
				else
				{
					$_SESSION['email'] = $logged_in_user;
					header('location: welcome.php');
				}
			}
			else
			{
				array_push($errors, "Something went wrong. Try again...");
			}
		}
	}

*/



	//post lead to database
	if (isset($_POST['submit_lead']))
	{
		$campaign_name = mysqli_real_escape_string($db, $_POST['campaign_name']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$surname = mysqli_real_escape_string($db, $_POST['surname']);
		$cell_number = mysqli_real_escape_string($db, $_POST['cell_number']);
		$id_number = mysqli_real_escape_string($db, $_POST['id_number']);
		$salary = mysqli_real_escape_string($db, $_POST['salary']);
		
		//ensure that form fields are filled
		if (empty($campaign_name)) { array_push($errors, "Campaign is required"); }

		if (empty($name))
		{
			array_push($errors, "Name is required");
		}
		else
		{
			$name = mysqli_real_escape_string($db, $_POST['name']);
			// check if name only contains letters and whitespace
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
		    {
		      array_push($errors, "Only letters and white space in Name allowed");
		    }
		}
		if (empty($surname)) {
			array_push($errors, "Surname is required");
		}else
		{
			$surname = mysqli_real_escape_string($db, $_POST['surname']);
			// check if name only contains letters and whitespace
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$surname))
		    {
		      array_push($errors, "Only letters and white space in Surname allowed");
		    }
		}
		if (empty($cell_number))
		{
			array_push($errors, "Cell number is required");
		}
		else
		{
			$cell_number = mysqli_real_escape_string($db, $_POST['cell_number']);
			// check if name only contains letters and whitespace
		    if (preg_match('/^[0-9]*$/',$cell_number))
		    {
		    	if (strlen($cell_number) != 10)
		    	{
		    		//...
		    		array_push($errors, "Only 10 cell number digits allowed");
		    	}
		    }
		}

		if (empty($id_number))
		{
			array_push($errors, "ID Number is required");
		}
		else
		{
			$id_number = mysqli_real_escape_string($db, $_POST['id_number']);
			// check if name only contains letters and whitespace
		    if (preg_match('/^[0-9]*$/',$id_number))
		    {
		    	if (strlen($id_number) != 13)
		    	{
		    		# code...
		    		array_push($errors, "Only 13 Id number digits allowed");
		    	}
		    }
		}

		if (empty($salary)) { array_push($errors, "Salary is required"); }

		if (count($errors) == 0)
		{
			$sql = "INSERT INTO invnt_tbl (campaign_name, name, surname, cell_number, id_number, salary) VALUES ('$campaign_name', '$name', '$surname', '$cell_number', '$id_number', '$salary')";

	   		mysqli_query($db, $sql) or die(mysqli_connect_error());
		   	$_SESSION['success'] = "Successfully inserted...!";
		   	array_push($errors, "Successfully inserted...!");
		   	header("location: welcome.php");
		}
	}



	//Delete Data users
  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM users WHERE id=$id");
    $_SESSION['message'] = "Details deleted!"; 
    //header('location: dashboard.php');
  }

  	//delete leads
    if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM invnt_tbl WHERE id=$id");
    $_SESSION['message'] = "Details deleted!"; 
    //header('location: dashboard.php');
  }



  //Update data... 
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $role = $_POST['role'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $cell_number = $_POST['cell_number'];
    $id_number = $_POST['id_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    mysqli_query($db, "UPDATE users SET role='$role', name='$name' surname='$surname', cell_number='$cell_number' id_number='$id_number', email='$email', password='$password' WHERE id=$id");
    $_SESSION['message'] = "Details Updated!";
    //header('location: dashboard.php');
  }

  //Search engine
  $search = "SELECT * FROM users";
  if( isset($_GET['search']) == $search){
      $name = $_GET['search'];
      $search = "SELECT * FROM users WHERE name LIKE '%$name%'";

      $result = $db->query($search);
  }




//Edit data...
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM invnt_tbl WHERE id=$id");

    if (count($record) == 1 ) {
      $n = mysqli_fetch_array($record);
      $id = $n['id'];
      $campaign_name = $n['campaign_name'];
      $name = $n['name'];
      $surname = $n['surname'];
      $cell_number = $n['cell_number'];
      $id_number = $n['id_number'];
      $salary = $n['salary'];
    }
  }

?>