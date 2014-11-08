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
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
        </li>
      </ul>
      <form class="navbar-form navbar-center" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br><center>
  <b><h1>Order Queue</h1>
<table class="table table-condensed">
  <?php
  $connect = mysql_connect("localhost","root","");
  mysql_select_db("app_db", $connect);
  // will change to select from orders where restaurant id = $rest_id ORDER BY(id) DESC
  $query = mysql_query("SELECT id FROM orders WHERE rest_id='1' ");
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
    <center><tr class="success" align="center"><td><br>
      <h3> <? echo $id."\n"; ?></h3>
      </td></center>
      <?
    $get_items = mysql_query("SELECT * FROM ordered_items WHERE order_id = '$id'") or die (mysql_error());
      while($row_items = mysql_fetch_assoc($get_items)){
          $item[] = $row_items['item'];
          $quantity[] = $row_items['quantity'];
          $order_id[] = $row_items['order_id'];
        }
        if($c == 0){
       foreach($item as $k => $v){
         ?><td><?
         echo $v." ".$quantity[$k];
         ?></td><?
      }
    }
     if($c > 0){
        array_splice($item,0,$oldsz);
        array_splice($quantity,0,$oldq);
        array_splice($order_id,0,$old_oi);
        foreach($item as $key => $value){
          ?><td><?
          echo $value." ".$quantity[$key];
          ?><td><?
          }
  }
  ?>
  </tr>
  <?
  $c++;
 $oldsz = count($item);
 $oldq = count($quantity);
 $old_oi = count($order_id);
  }
 }

  ?></pre>
</table>
</center>
