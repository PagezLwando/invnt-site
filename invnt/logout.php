<?php
	//logout
	if (isset($_GET['logout']))
	{
		session_start();
		if (isset($_SESSION["email"]))
		{
			session_destroy();
			# code...
			unset($_SESSION['email']);
			header('location: index.php');
		}
	}
?>