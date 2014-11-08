<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type 	= 	$_POST['type'];
	$address =	$_POST['address'];

	if($username && $password && $type && $address)
	{
		$connect = mysql_connect("localhost","root","") or die("Couldn't connect");
		mysql_select_db("phplogin") or die("couldn't find db");
		$result = mysql_query("INSERT INTO 'users' ('username', 'password', 'type', 'address') VALUES ('$username', '$password', '$type', '$address')");

		if($result)
			echo "Successful registration";
		else
			echo "Failed registration";
	}
	else
		die("Please enter the username, password, type, and address");
?>