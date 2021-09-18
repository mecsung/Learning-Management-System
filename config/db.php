<?php
	
	require 'constants.php';
	
	// create connection object
	$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			
	if ($connection->connect_error) {
		die('Database Error: '. $connection->connect_error);
	}
			
?>