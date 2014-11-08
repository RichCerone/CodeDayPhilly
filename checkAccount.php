<?php
	include "./dbConnect.php";

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysql_query("SELECT * FROM users WHERE username ='$username' AND WHERE password = '$password'") or die(mysql_error());
	$row = mysql_fetch_assoc($result);

	if($row)
	{
		echo "successful";
	}
	else
		echo "failed";
?>