<?php
session_start();
	include "./dbConnect.php";

	$username = $_SESSION['username'];
	$user_id = mysql_query("SELECT id FROM users WHERE username = '$username'") or die(mysql_error());
	$id = mysql_fetch_assoc($user_id);
	$result = mysql_query("SELECT * FROM orders WHERE user_id = '$id'") or die(mysql_error());
	?><div id="orders" class="orders"><ul><?php
	$count = 1;
	while($row = mysql_fetch_assoc($result))
	{
		$res = $row['rest_id'];
		$result = mysql_query("SELECT name FROM rests WHERE id = '$res'");
		$restName = mysql_fetch_assoc($result);

		$res = $row['id'];
		$result = mysql_query("SELECT * FROM ordered_items WHERE order_id = '$res'");
		$items[] = mysql_fetch_assoc($result);

		$itemQuantity = $items['quantity'];

		$res = $items['id'];
		$result = mysql_query("SELECT name FROM items WHERE id = '$res'");
		$itemName = mysql_fetch_assoc($result);
		$result = mysql_query("SELECT price FROM items WHERE id = '$res'");
		$itemPrice = mysql_fetch_assoc($result);

		?>
		<li class="thumbnail col-sm-3"><?php
			echo $restName;
			echo $itemName;
			echo $itemPrice;
			echo $itemQuantity;
			echo ($itemQuantity * $itemPrice);
		?></li>
		<?php
		$count += 1;
	}
	?></ul></div><?php
?>
