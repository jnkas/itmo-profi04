//var dt = "10.12.2017";
var id = "date";
var acctdate = new Date();
var dt = acctdate.getDate() +"."+ (acctdate.getMonth()+1) +"."+ acctdate.getFullYear();
console.log(acctdate.getHours());
console.log(dt);
// var menuId = $( "ul.nav" ).first().attr( "id" );
var request = $.ajax({
  url: "serviser.php",
  method: "POST",
  data: { date : dt }
});
 
request.done(function( obj ) {	
	var text = JSON.parse(obj);
	console.log(obj);

	$('#day').html(acctdate.toLocaleString("ru",{day:'numeric'}));
	$('#month').html(acctdate.toLocaleString("ru",{month:'long'}));
	$('#title').html(text.title);
	$('#img').html('<img src= "img/'+text.img +' ">');
	$('#descr').html(text.descr);	
});
 



request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


