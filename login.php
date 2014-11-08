<html>
<h1><font size=5 color=red><b>Website.com</b></font><h1><hr><hr>
<font size=3>
<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if($username&&$password) {
$connect = mysql_connect("localhost","root","") or die("Couldn't connect");
mysql_select_db("phplogin") or die("couldn't find db");
$query = mysql_query("SELECT * FROM users WHERE username='$username'");
$numrows = mysql_num_rows($query);
if ($numrows!=0)
{
while ($row = mysql_fetch_assoc($query))
{
	$dbusername = $row['username'];
	$dbpassword = $row['password'];
}
if ($username==$dbusername&&$password==$dbpassword)
	{
    echo "login successful! <a href='member.php'>click here to access your page</a>";
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