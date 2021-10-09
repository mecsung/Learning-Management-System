<?php
	require 'config/db.php';
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM faculty WHERE id='$id'";	
	$result = mysqli_query($connection, $sql);
	
	if ($result == TRUE) 
		{
			$_SESSION['delete-success'] = "1 row successfully deleted!";
			header('location: faculty-module.php');
			exit();
		}
?>