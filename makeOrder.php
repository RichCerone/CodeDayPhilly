<!DOCTYPE HTML>
<!--Import JQuery-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<head>
    <!--Import font-->
   <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!--Import css style sheet-->
   <link rel="stylesheet" type="text/css" href="./makeOrder.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<html>
    <!--Navigation bar using BootStrap-->
  <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <h4>Rowan Delviery System</h4>
      </a>
    </div>
  </div>
</nav>
  
<!--Search bar using boot strap-->
<form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<br><br><!--Used to center page-->
<!--Non boot strap html-->
    <body>
        <!--Title-->
        <!--Order form for customer-->
        <h1 class="title">Make An Order</h1>
        <form action="" method="post" id="order">
            <!--Title for restaurant selection-->
            <h4 class=restSelect>Choose A Restaurant</h4>
            <!--Select resturaunt-->
            <select id="selectRest" class="selectRest">
                <option value="Select Restaurant">Select Restaurant</option>
                <option value="Rys Bagels">Ry's Bagels</option>
                <option value="Hunan Wok">Hunan Wok</option>
                <option value="Glassboro Pizzeria">Glassboro Pizzeria</option>
            </select>
            <!--Select menu items based on resturaunt-->
        </form>
        <!--menuItems appear here-->
        <form action="" id="">
            <div id="menuItems"><!--Drop down box appears in here--></div>
        </form>
        <form action="">
            <input type="submit" value="Place Order!" class="btn btn-default">
        </form>
    </body>
</html>
<script>
    $(document).ready(function(){
        var $selecter = $('#selectRest');
        var $items = $("#menuItems");
        $("#order").click(function(event)
        {
            event.preventDefault();
            var restaurant = $selecter.val(); //Get value in drop down.
            //Pass value from drop down box and pass it into itemsForOrder.php.
            $.post("itemsForOrder.php",{selectRest: restaurant},function(data)
            {
                $items.html(data); //Print out html from itemsForOrder.php
            });
        });
    });
</script>