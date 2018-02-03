console.log('1234');

var request = $.ajax({
  url: "index.php",
  method: "POST",
   data: {"controller" : "controller" ,"action" : "getMenu"}
});

request.done(function( obj ) {	
	console.log(obj);
	//var text = JSON.parse(obj);
	$('#menu').html(obj);
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


