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
      <form class="navbar-form navbar-left" role="search">
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
  $query = mysql_query("SELECT * FROM orders WHERE rest_id='1' ORDER BY(id) DESC ");
  $num_orders = mysql_num_rows($query);
  if($num_orders > 0){
    while($row = mysql_fetch_assoc($query)){
      $all_orders[] = array(
        'id' => $row['id'],
        'user_id' => $row['user_id'],
        'rest_id' => $row['rest_id'],
        'flag' => $row['flag']
      );
    }
    ?><pre><?
  //  print_r($all_orders);
    foreach($all_orders as $key => $val){
    echo $all_orders[$key]['id']."\n";
    //  echo $all_orders['user_id']." ".$all_orders['rest_id'];
      /*$get_items = mysql_query("SELECT * FROM ordered_items WHERE order_id=$ord_id");
        while($row_items = mysql_fetch_assoc($get_items)){
          $order_items[] = array (
          'id' => $row_items['id'],
          'item' => $row_items['item'],
          'quantity' => $row_items['quantity']
        );
      } foreach($order_items as $tr){
        echo $tr['item']."  ".$tr['quantity'];
      }
      */

    }
  }

  ?></pre>
</table>
</center>
