<?php 

	/*Local DB*/
	// $host = 'localhost';
	// $username = 'root';
	// $pass = '';
	// $db = 'a2zinterior';
	
	/*Remote DB*/
	$host = 'localhost';
	$username = 'interiora2use';
	$pass = 'SSLAhz&?u9lt';
	$db = 'a2zinterior';

	$conn = new mysqli($host, $username, $pass, $db);

	if ($conn->connect_error) {
		die('Connection Failed '. $conn->connect_error);
	}
?>