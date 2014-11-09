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
    		<h1>Rowan Delivery Systems</h1>
    	</div>
    	<div class="row">
    		<div class="col-sm-4 col-sm-offset-2">
    			<div id ="loginwell" class="well well-lg">
    				<center>
    					<form role="form" action ="checkAccount.php">
  						<div class="form-group">
						    <label for="username">Username</label>
						    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
						  </div>
						  <div class="form-group">
						    <label for="password">Password</label>
						    <input type="password" name="password"class="form-control" id="password" placeholder="Password">
						  </div>
						  <div class="form-group">

						  </div>
						  <button type="submit" class="btn btn-success">Log in</button>
						</form>	
					</center>
    			</div>
    		</div>
    		<div class="col-sm-4">
    			<div id ="registerwell" class="well well-lg">
    				<center>
    					<form role="form" action ="registerAccount.php">
  						<div class="form-group">
						    <label for="UserNameRegister">Username</label>
						    <input type="text" name = "registerusername" class="form-control" id="UserNameRegister" placeholder="Register Username">
						  </div>
						  <div class="form-group">
						    <label for="PasswordText">Password</label>
						    <input type="password" name = "registerpassword"class="form-control" id="PasswordText" placeholder="Password">
						  </div>
						  <div class="form-group">
						  	<label class="radio-inline">
							  <input type="radio" name="radio"  value=0> Individual
							</label>
							<label class="radio-inline">
							  <input type="radio" name="radio"  value=1> Organization
							</label>
							<label class="radio-inline">
							  <input type="radio" name="radio"  value=2> Restaurant
							</label>
						  </div>
						  <button type="submit" name="registerButton" class="btn btn-primary">Register</button>
						</form>	
					</center>
    		</div>
		</div>
	</div>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </body>
</html>