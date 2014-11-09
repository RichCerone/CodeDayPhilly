window.onload = function() {


	$("additemBtn").click(function() {
  		alert( "Handler for .click() called." );
});
}

$("a").click(function() {
  		 $("#dropdownMenu1").text(this.text);

});


function addOrder() {
	if($("#quantity").value== ""){
    $("#modalbody").append( document.createTextNode( "1 "+ $("#dropdownMenu1").text()));
    $("#modalbody").add("<br />").appendTo($("#modalbody"));
	}else{


    $("#modalbody").append( document.createTextNode($("#quantity").val()+" "+  $("#dropdownMenu1").text()));
    $("#modalbody").add("<br />").appendTo($("#modalbody"));
}
}


var counter =0;
function addOrderWell() {
	var string = $("#modalbody").text()
    $("#myModal").toggle();
    $("#wellBody").add("<div class='well' id='well"+counter+"'>").appendTo($("#wellBody"));
    $("#well"+counter).text(string);
    $("#well"+counter).add("<br />").appendTo($("#well"+counter));
    $("#well"+counter).append($("#address").val()).appendTo($("#well"+counter));
    $("#well"+counter).add("<br />").appendTo($("#well"+counter));
    $("#well"+counter).add("<button type='button' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#mapModal'id ='additemBtn' ><span class='glyphicon glyphicon-flag'></span> View Map</button>").appendTo($("#well"+counter));
		$("#well"+counter).add("<button type='button' class='btn btn-success btn-sm hidable' onclick='hideMe()' id ='deliverButton' ><span class='glyphicon glyphicon-ok'></span> Ready</button>").appendTo($("#well"+counter));
	  $("#wellBody").add("</div>").appendTo($("#wellBody"))

	var str = $("#address").val();
	var replaced = str.replace(/ /g, '+');
    $("#googleMap").attr("src","https://www.google.com/maps/embed/v1/directions?key=AIzaSyDgiM9vSlIUNiUKdisryCPAFt7Qg4qxNT4&center=39.7261,-75.1324&zoom=14&origin=325+Mullica+Hill+Rd+Glassboro&destination="+replaced);
    $("#modalbody").text("");
    counter++;
}
function hideMe()
{
        $("#well0").hide();
}
