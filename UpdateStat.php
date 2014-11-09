<?php
$connect = mysql_connect("localhost","root","");
mysql_select_db("app_db", $connect);
$item_id = $_POST['id'];
$get_o_id = mysql_query("SELECT order_id FROM ordered_items WHERE id='$item_id'");
$or_id = mysql_fetch_assoc($get_o_id);
$oid = $or_id['order_id'];
$checkOrder = mysql_query("SELECT * FROM ordered_items WHERE status='0' AND order_id='$oid'") or die(mysql_error());
$rows = mysql_num_rows($checkOrder);
if($rows == 0){
    $query = mysql_query("UPDATE orders SET flag = '1' WHERE id='$oid'");
  }
$query = mysql_query("UPDATE ordered_items SET status = '1' WHERE id='$item_id'");
if($query){
  $get_ord_id = mysql_query("SELECT order_id FROM ordered_items WHERE id='$item_id'");
  $ord_id = mysql_fetch_assoc($get_ord_id);
  $orderId = $ord_id['order_id'];
  $checkOrder = mysql_query("SELECT * FROM ordered_items WHERE order_id='$orderId' AND status='0'") or die(mysql_error());
  $rows = mysql_num_rows($checkOrder);
  if($rows == 0){
    echo "done";
  } else {
    $query = mysql_query("UPDATE orders SET flag = '1' WHERE id='$orderId'");
  }
}
