<?php
   //Import database connection.
   include "./dbConnect.php";
   //Post restaurant data from makeOrder.php.
   $restaurant = $_POST["selectRest"];
   //Don't display anything if default selector is posted.
   if($restaurant === "Select Restaurant")
   {
       exit();
   }
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
    <select id="selectRest" class="selectRest">
    <?php
    //For all items in array...
    foreach($allItems as $item)
    {
        $menuItem = $item['name'];
        ?><!--exit php-->
            <!--Echo out html using allItems array for drop down id's-->
            <option value="<?php echo $menuItem ?>"><?php echo $menuItem?></option>
<?php       
    }  //Insert last bracket.
?></select>