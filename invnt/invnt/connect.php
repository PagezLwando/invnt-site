<?php
	//connect.php
	$connect = new PDO("mysql:host=localhost;dbname=invnt_db", "root", "");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>