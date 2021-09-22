<?php
	require 'config/db.php';
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM students WHERE id='$id'";	
	$result = mysqli_query($connection, $sql);
	
	if ($result == TRUE) 
		{
			$_SESSION['delete-success'] = "1 row successfully deleted!";
			header('location: student-module.php');
			exit();
		}
?>