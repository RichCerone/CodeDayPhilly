<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".content").click(function(event){
    event.preventDefault();
 $("a").click(function(event){
        var uid = $(this).attr("id");
         console.log(uid);
         // post with item id to php file, update finished status in mysql
         // if all rows with same order id have status flag 1 then order has
         // been processed
         $.post('UpdateStat.php', {id: uid}, function(data){
              console.log(data);
              if(data == "done"){
                location.reload();
              }
            });
        })}
      )});
</script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="#">Rowan Delivery System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="restaurant.php">Order Queue</a></li>
        <li><a href="restaurantItemAdd.php">Add Items</a></li>
        <li><a href="restaurant3.php">Quick Orders</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search Customers">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br><center>
  <b><h1>Order Queue</h1><br>
    <p>Shows recently sent orders. <br>
      Double-click the orders to close them and send
      back to the user that their order has been started.</p></b>
<div id="content" class = "content">
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
          <?php
          echo "Item: ";
          echo $v;
          ?><br><?php
          echo "Quantity: ";
          echo $quantity[$k];
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
</center>
</div>
