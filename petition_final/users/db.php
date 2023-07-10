<?php

	$server='localhost';
	$username='root';
	$password='';
	$database='petitionisg';
	$db = mysqli_connect($server,$username,$password,$database);
	// Check connection
	if (!$db) {
		die("Connection failed: " . mysqli_connect_error());
	}
	// else{
	// 	echo 'connected';
	// }

?>