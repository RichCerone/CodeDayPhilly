<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title>Rowan Delivery Systems</title>
</head>
  <body>
  <div id="contactform">
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
                <label for="Address">Address</label>
                <input type="text" name="registeraddress" class="form-control" id="AddressRegister" placeholder="Register Address">
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
</div>
</div>
</div>

    <!-- You can even embed a Google Form here -->
  </div>

<div id="map-canvas" style="width: 100%; height: 100%"></div>
</body>
</html>
<style type="text/css">
#map-canvas {
  height: 100%;
  width: 100%;
  position:absolute;
  top: 0;
  left: 0;
  z-index: 0; /* Set z-index to 0 as it will be on a layer below the contact form */
}

#contactform {
  position: relative;
  z-index: 1; /* The z-index should be higher than Google Maps */
  opacity: .85; /* Set the opacity for a slightly transparent Google Form */
}

</style>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyAd_qUj056TQ8botUBBwAoRY8Mm5z4O8Lk&libraries=places"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="script.js"></script>
<script>
$(document).ready(function(){
  var lat;
  var longi;
  if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition(showPosition);
  }
  function showPosition(position){
       lat = position.coords.latitude.toString().substr(0,6);
       longi = position.coords.longitude.toString().substr(0,7);
      console.log(lat);
      console.log(longi);

      var mapOptions = {
        center : new google.maps.LatLng(lat,longi),
        zoom : 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

      google.maps.event.addDomListener(window, 'load', showPosition);
  }
  geolocate();

  function geolocate() {
            var input = document.getElementById('AddressRegister');
            var optns = {
                types: ['address']
            };
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = new google.maps.LatLng(
                    position.coords.latitude, position.coords.longitude);
                ac = new google.maps.places.Autocomplete(input, optns).setBounds(new google.maps.LatLngBounds(geolocation, geolocation));

              });
            }
          }

});

</script>
