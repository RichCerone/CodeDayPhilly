window.onload = function() {

	$("h1").click(function() {
  		alert( "Handler for .click() called." );
});

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
    $("#wellBody").add("</div>").appendTo($("#wellBody"))

     $("#modalbody").text("");
    counter++;
}





