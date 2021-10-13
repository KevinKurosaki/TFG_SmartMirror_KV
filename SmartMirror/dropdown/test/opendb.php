<?php
	$username = "usersm";
	$password= "fMYGyWl7Q6tANOKS";
	$host ="localhost";
	$database ="smartmirror";
	
	$conn = mysqli_connect($host, $username, $password) or die("Could not connect");
	msqli_select_db($conn, $database);
?>