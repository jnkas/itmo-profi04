var menuId = $( "ul.nav" ).first().attr( "id" );
var request = $.ajax({
  url: "serviser.php",
  method: "POST",
  data: { id : menuId },
  dataType: "json"
});
 
request.done(function( obj ) {
    $( "#date" ).html( "Сегодня<br>" + obj.date );
	$( "#event" ).html( "Празднуем<span><br>" + obj.event + "<span>");
	$( "#subscribe" ).html( "Немного истории<br><p>" + obj.subscribe + "</p>" );
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});

console.log('script running')