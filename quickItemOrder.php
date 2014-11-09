<?php
    //Import database connection.
    include "./dbConnect.php";
    $count = 0;
    session_start();

    //Post restaurant data from makeOrder.php.
    $restaurant = $_SESSION["username"];
    //Don't display anything if default selector is posted.
    //Get restaurant name.
    $result = mysql_query("SELECT * FROM rests WHERE name = '$restaurant'") or die(mysql_error());
    //Get the row with the restaurant name.
    $row = mysql_fetch_assoc($result);
    //id is the current selected row.
    $id = $row['id'];
    //Get the name of each item based on restaurant id.
    $query = mysql_query("SELECT name FROM items WHERE rest_id = '$id'");
    //Get item name insert into array until no more items.
    while($row_item = mysql_fetch_assoc($query))
    {
        $allItems[] = array(
        'name' => $row_item['name']
        );
    }
?>

<ul id="quickTimeOrder">

<?php
    //For all items in array...
    foreach($allItems as $item)
    {
        $menuItem = $item['name'];
?><!--exit php-->
<!--Echo out html using allItems array for drop down id's-->
        <li id="item"  role="presentation" value="<?php echo $menuItem ?>">
        <a role="menuitem" tabindex="-1" href="#"><?php echo $menuItem?></a></li>
        <?php
    } //Insert last bracket.
?>

</ul>
<!--Let user input how many items he wants-->
<br><!--new line in case another order is added-->
