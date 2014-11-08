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
		mysql_query("INSERT INTO 'app_db', 'users' ('username', 'password', 'type', 'address') VALUES ('$username', '$password', '$type', '$address')";
	}
	else
		die("Please enter the username, password, type, and address");
?>