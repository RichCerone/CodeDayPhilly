<?php
session_start();
	include "./dbConnect.php";

	$username = $_SESSION['username'];
	$user_id = mysql_query("SELECT id FROM users WHERE username = '$username'") or die(mysql_error());
	$r_id = mysql_fetch_row($user_id);
	$id = $r_id[0];
	$result = mysql_query("SELECT * FROM orders WHERE user_id = '$id'") or die(mysql_error());
	?><div id="orders" class="orders"><ul><?php
	$count = 1;
	while($row = mysql_fetch_assoc($result))
	{
			$stuff[] = array(
				'rest_id' => $row['rest_id'],
				'id' => $row['id']
			);

}
foreach($stuff as $mstuff){
		$res = $mstuff['rest_id'];
		$result = mysql_query("SELECT name FROM rests WHERE id = '$res'");
		$restName = mysql_fetch_row($result);
		$r_name = $restName[0];
		?> <li class="thumbnail col-sm-3"><?php
				echo $r_name;
				?><br><?php
		$res = $mstuff['id'];
		$result = mysql_query("SELECT * FROM ordered_items WHERE order_id = '$res'");
		while($rrow = mysql_fetch_assoc($result)){
			$qts[] = $rrow['quantity'];
			$item[] = $rrow['item'];
			foreach($qts as $key => $value)
			{
					$item_id = $item[$key];
					$set = mysql_query("SELECT * FROM items WHERE name = '$item_id'");
					$item = mysql_fetch_assoc($set);
					$itemPrice = $item['price'];
					echo "Item Name: ";
					echo $item_id;
					?><br><?php
					echo "Item Price: ";
					echo $itemPrice;
					?><br><?php
					echo "Quantity: ";
					echo $qts[$key];
					?><br><?php
					echo "Total Price: ";
					echo $itemPrice * $qts[$key];
			}
			unset($qts);
		}
		?></li>
		<?php
		$count += 1;
	}
	?></ul></div><?php
?>
