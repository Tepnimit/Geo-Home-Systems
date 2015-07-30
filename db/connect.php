<?php
# !!!! Come back to test this line 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "homecooking";
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>
