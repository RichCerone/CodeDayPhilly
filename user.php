<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>User Main Page</title>

    <!-- Bootstrap core CSS -->
    <link href="user_files/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="user_files/starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="user_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="user.php">User Menu</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="user.php">Make Order</a></li>
            <li><a href="userorders.php">Current Orders</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <center>
   		<h1 class="title">Make An Order</h1>
            <form method="post" id="order">
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
            <form>
                <div id="menuItems"><!--Drop down box appears in here--></div>
            </form>
            <h4>Quantity Of Items:</h4>
           <input type="text" value="1? 2? 3?" id="quantity">
           <br>
            <!--Done ordering, submit order to selected restaurant-->
            <input type="submit" value="Place Order!" id="placeOrder" class="btn btn-default">
            <!--Add button to add an additional item-->
            <input type="submit" value="Add Item" id="addItem" class="btn btn-default">
    </center>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="user_files/jquery.js"></script>
    <script src="user_files/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="user_files/ie10-viewport-bug-workaround.js"></script>

	</body>
</html>

<script>
    $(document).ready(function() //Show menu items when restaurant is selected.
    {
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

        $("#placeOrder").click(function(event) //Submit order.
        {
            event.preventDefault(); //Prevent redirection from page.
            var restaurant = $selecter.val(); //Get value in drop down.
            var $items = $("#allItems");
            var items = $items.val();
            var $quantity = $("#quantity");
            var quantity = $quantity.val();
            console.log(items);
            console.log(restaurant);
            console.log(quantity);

            $.post("createOrder.php",{selectRest: restaurant, item: items, quantity: quantity},function(data)
            {
                console.log("returned : " + data);
            });
            var quanitiy = $quantity.val();
            //Pass values from drop down boxes and textfield and pass it into orderStatus.php.
            $.post("orderStatus.php",{selectRest: restaurant, items: items, quantity: quantity},function(data)
            {
                //Empty call back.
            });
        });

        $("#addItem").click(function(event) //Add additional item on click.
        {
            event.preventDefault();
            var restaurant = $selecter.val(); //Get value in drop down.
            //Pass value from drop down box and pass it into itemsForOrder.php.
            $.post("itemsForOrder.php",{selectRest: restaurant},function(data)
            {
                $items.append(data); //Add html from itemsForOrder.php
            });
        });
    });


</script>
