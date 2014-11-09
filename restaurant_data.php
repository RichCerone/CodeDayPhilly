<table class="table table-condensed">

  <?php
  $connect = mysql_connect("localhost","root","");
  mysql_select_db("app_db", $connect);
  // will change to select from orders where restaurant id = $rest_id ORDER BY(id) DESC
  $query = mysql_query("SELECT id FROM orders WHERE rest_id='1' AND flag = '0' ORDER BY(id) DESC");
  $num_orders = mysql_num_rows($query);
  if($num_orders > 0){
    while($row = mysql_fetch_array($query)){
      $all_orders[] = array(
        'id' => $row['id']
      );
    }
    ?><pre><center><?
    $c = 0;
    $oldsz = 0;
  foreach($all_orders as $order){
    $id = $order['id'];
    ?>
    <center>
          <tr align="center"><td><br>
      <h3> <? echo "Order #".$id."\n"; ?></h3>
    </td></center><br>
      <?
    $get_items = mysql_query("SELECT * FROM ordered_items WHERE order_id = '$id'") or die (mysql_error());
      while($row_items = mysql_fetch_assoc($get_items)){
          $ids[] = $row_items['id'];
          $item[] = $row_items['item'];
          $quantity[] = $row_items['quantity'];
          $order_id[] = $row_items['order_id'];
        }
        if($c == 0){
       foreach($item as $k => $v){
         $itemid = $ids[$k];
         ?><tr class="success" align="center" id="<? echo $itemid ?>">
        <td>
          <a style="width: 100%;" href="<? echo $itemid ?>" id="<? echo $itemid ?>">
          <?
         echo $v." ".$quantity[$k];
         ?></a></tr></td></a><?
      }
    }
     if($c > 0){
        array_splice($item,0,$oldsz);
        array_splice($quantity,0,$oldq);
        array_splice($order_id,0,$old_oi);
        array_splice($ids,0,$old_ids);
        foreach($item as $key => $value){
          $i_id = $ids[$key];
          ?><tr class="success" align="center" id="<? echo $i_id ?>">
           <td>
              <a style="width: 100%;" href="<? echo $i_id ?>" id="<? echo $i_id ?>">
            <?
          echo $value." ".$quantity[$key];
          ?></tr></td></a><?
          }
  }
  ?>
</tr>
  <?
  $c++;
 $oldsz = count($item);
 $oldq = count($quantity);
 $old_oi = count($order_id);
 $old_ids = count($ids);
  }
 }

  ?></pre>
</div>
</table>
