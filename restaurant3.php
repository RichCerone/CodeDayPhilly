
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rowan Quick Delivery</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
  <body>
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
            <li><a href="restaurant.php">Order Queue</a></li>
            <li><a href="restaurantItemAdd.php">Add Items</a></li>
            <li class="active"><a href="restaurant3.php">Quick Orders</a></li>
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
    <div class="container">

      <div class="text-center">
        <h1>Orders</h1>
      </div>
      <button type="button" class="btn btn-success btn-lg" id ="addOrderBtn" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-plus"></span> Add Order
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Order</h4>
            <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"  data-toggle="dropdown">item
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">bagel</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">bagel with cream cheese</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">special</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Nachos</a></li>
          </ul>
          <label>Quantity</label>
          <input type="number" id="quantity" value="1" min="1" max="10">

          <button type="button" class="btn btn-success btn-sm" onClick="addOrder()"id ="additemBtn" >
            <span class="glyphicon glyphicon-plus"></span> Add Item
        </button>
        </div>
        <hr>
          <div class="modal-body">
              <span id="modalbody"></span>
        </div>

          </div>
          <div class="modal-footer">
            <div class="col-xs-8">
            <input type="text" id="address" class="form-control" placeholder="address">
         </div>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onClick="addOrderWell()" >Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <center>
      <div class="row">
      <span class ="col-sm-8 col-sm-offset-2" id="wellBody">
        <div class="well" id = "content">
      <?php
      error_reporting(0);
      session_start();
      $user = $_SESSION['username'];
      $connect = mysql_connect("localhost","root","");
      mysql_select_db("app_db", $connect);
      $get_use_id = mysql_query("SELECT id FROM users WHERE username='$user'");
      $row_id = mysql_fetch_row($get_use_id);
      $id = $row_id[0];
      // will change to select from orders where restaurant id = $rest_id ORDER BY(id) DESC
      $query = mysql_query("SELECT id,address FROM orders WHERE rest_id='$id' AND flag = '0' ORDER BY(id) DESC");
      $num_orders = mysql_num_rows($query);
      if($num_orders > 0){
        while($row = mysql_fetch_array($query)){
          $all_orders[] = array(
            'id' => $row['id'],
            'address' => $row['address']
          );
        }
        ?><center><?
        $c = 0;
        $oldsz = 0;
      foreach($all_orders as $order){
        $id = $order['id'];
        $address = $order['address'];
        ?>
        <center>

          <h3> <? echo "Order #".$id."\n"; ?></h3>
        </center><br>
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
             ?>
              <a style="width: 100%;" href="<? echo $itemid ?>" id="<? echo $itemid ?>" class="anchors_orders">
              <?php
              echo "Item: ";
              echo $v;
              ?><br><?php
              echo "Quantity: ";
              echo $quantity[$k];
              ?><br><?php
              echo "Address: ";
              echo $address;
             ?></a><?
          }
        }
         if($c > 0){
            array_splice($item,0,$oldsz);
            array_splice($quantity,0,$oldq);
            array_splice($order_id,0,$old_oi);
            array_splice($ids,0,$old_ids);

            foreach($item as $key => $value){
              $i_id = $ids[$key];
              ?>
                  <a style="width: 100%;" href="<? echo $i_id ?>" id="<? echo $i_id ?>" class="anchors_orders">
                <?
              echo "Item: ";
              echo $value;
              ?><br><?php
              echo "Quantity: ";
              echo $quantity[$key];
              ?><br><?php
              echo "Address: ";
              echo $address;
              ?></a></div><?

              }
            }
            $c++;
           $oldsz = count($item);
           $oldq = count($quantity);
           $old_oi = count($order_id);
           $old_ids = count($ids);
          }
      }
      ?>
      <hr>
      <center><p>View last map</p></center>
      <br>
      <button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#mapModal'id ='additemBtn' ><span class='glyphicon glyphicon-flag'></span> View Map</button>
    </div>
      </span>
    </center>
  </div>
<!-- Modal -->
    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

          <div class="modal-body">
              <span id="modalbody"></span>
        </div>
           <iframe
               id = "googleMap"
          width="400"
          height="400"
          center = "39.7001, 75.1114"
          zoom = "14"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDgiM9vSlIUNiUKdisryCPAFt7Qg4qxNT4&center=39.7261,-75.1324&zoom=14&origin=325+Mullica+Hill+Rd+Glassboro&destination=9+Williamsburg+Court+Glassboro">
        </iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){
            $("#content").click(function(event){
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
                  })
                  })
            });
    </script>
  </body>
</html>
