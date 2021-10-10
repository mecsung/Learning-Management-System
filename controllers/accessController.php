<?php
	session_start();
	//Deny Access to pages if user is not logged in
	if(!isset($_SESSION['id'])){
		header("location: index.php");
		exit();
	}
?>