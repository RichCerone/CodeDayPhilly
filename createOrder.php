<?php
    include "/.dbConnect.php";
    $restaurant = $_POST["selectRest"];
    $username = $_POST["username"];
    $result = mysql_query("SELECT id FROM users WHERE username = '$username'");
    $user_id = mysql_fetch_assoc($result);
    $result = mysql_query("SELECT id FROM rests WHERE name = '$restaurant'");
    $rest_id = mysql_fetch_assoc($result);
    $result = mysql_query("SELECT address FROM users WHERE id = '$user_id'");
    $address = mysql_fetch_assoc($result);
    $result = mysql_query("INSERT INTO orders (user_id, rest_id, flag, address) VALUES ('$user_id', '$rest_id', '1', '$address')");
?>