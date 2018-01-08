var today = "2018-01-09";

var request = $.ajax({
		url: "servicer.php",
		method: "POST",
		data: { id : today },
		dataType: "json"
});


request.done(function( msg ) {
	$("#high").html(msg.dat);
    $("#img").html('<img src="img/'+today+'.jpg">');
    $("#middle").html(msg.event);
    $("#down").html(msg.preview);
});



request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
});

console.log("script complete");