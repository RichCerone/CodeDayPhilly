<?php
session_start();
    $connect = mysql_connect("localhost","root","");
    mysql_select_db("app_db", $connect);
    $restaurant = $_POST["selectRest"];
   $username = $_SESSION["username"];
    $quantity = $_POST['quantity'];
    $item = $_POST['item'];
    $result = mysql_query("SELECT id FROM users WHERE username = '$username'");
    $u_id = mysql_fetch_row($result);
    $user_id = $u_id[0];
    $result = mysql_query("SELECT id FROM rests WHERE name = '$restaurant'");
    $rest_id = mysql_fetch_row($result);
    $r_id = $rest_id[0];
    $result = mysql_query("INSERT INTO orders(user_id, rest_id, flag) VALUES ('$user_id', '$r_id', '0')");
    if($result){
      $get_data = mysql_query("SELECT MAX(id) FROM orders");
       $row = mysql_fetch_row($get_data);
       $last_id = $row[0];
      $insert = mysql_query("INSERT INTO ordered_items(order_id,quantity,item,status) VALUES('$last_id','$quantity','$item','0')");
      if($insert){
        echo "order placed";
      }
    }
?>
