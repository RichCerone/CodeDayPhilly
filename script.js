window.onload = function() {

	$("h1").click(function() {
  		alert( "Handler for .click() called." );
});

	$("additemBtn").click(function() {
  		alert( "Handler for .click() called." );
});
}

function addOrder() {
    $("#modalbody").append( document.createTextNode( "Hello" ) );
    alert("gi00");
}


