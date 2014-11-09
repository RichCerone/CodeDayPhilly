<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
  <body>
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
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Taco</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Burrito</a></li>
				    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Quesadilla</a></li>
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
			<span class ="col-sm-8 col-sm-offset-2" id="wellBody"></span>
			</div>
		</center>
	</div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>