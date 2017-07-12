<?php 
	$servername = "";
	$username = "";
	$password = "";
	$dbname = "";

	if(!($conn = mysqli_connect($servername, $username, $password, $dbname))){
		die("Connection failed: " + mysqli_connect_error());
	}
?>
	
