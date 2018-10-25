<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db = "carRental";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>