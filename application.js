var date=dt;
var request = $.ajax({
  url: "serviser.php",
  method: "POST",
  data: { id : dt},
  dataType: "json"
});
 
request.done(function( msg ) {
  $( "#log" ).json( msg );
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});
console.log("script running");