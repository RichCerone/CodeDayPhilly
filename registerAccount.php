<html>
	<?php
	session_start();
	$username = isset($_GET['registerusername']);
	$password = isset($_GET['registerpassword']);
	$password = isset($_GET['radio']);

		$username = $_GET['registerusername'];
		$password = $_GET['registerpassword'];
		$type = $_GET['radio'];

		$connect = new mysqli("localhost","root","", "app_db") or die("Couldn't connect");
	
		$sql = "INSERT INTO users (username, password, type)
		VALUES ('$username', '$password', '$type')";

		if ($connect->query($sql) === TRUE) {
 		   echo "New record created successfully";
		} else {
 		   echo "Error: " . $sql . "<br>" . $connect->error;
	
		}	
	?>
</html>