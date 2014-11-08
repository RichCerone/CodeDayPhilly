<html>
	<h1><font size=5 color=red><b>Website.com</b></font><h1><hr><hr>
	<font size=3>
	<?php
	session_start();
	$username = isset($_GET['username']);
	$password = isset($_GET['password']);

	if($username&&$password) 
	{

		$username = $_GET['username'];
		$password = $_GET['password'];

		$connect = new mysqli("localhost","root","", "app_db") or die("Couldn't connect");
	
		$query = mysqli_query($connect, "SELECT * FROM users WHERE username='$username'");

		$result = $connect->query("SELECT * FROM users WHERE username='$username'");
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				$role = $row['type'];
			}
			if ($username==$dbusername&&$password==$dbpassword)
			{
				if($role == '1'){
					header( 'Location: user.php' ) ;
				}
				else if($role=='2'){
					header( 'Location: restaurant.php' ) ;
				}
				$_SESSION['username'] = $dbusername;
			}
			else
				echo "incorrect password!";
		}
		else
			die("That user doesn't exist!");
	}
	else
		die("Please enter a username and password");
	

	?>
</html>