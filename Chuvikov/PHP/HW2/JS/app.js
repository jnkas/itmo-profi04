var today = "12.02.2017";

var request = $.ajax({
		url: "servicer.php",
		method: "POST",
		data: { id : today },
		dataType: "html"
});

request.done(function( obj ) {
	var html = obj;
	console.log(obj);
	$("#day-calender").html(html);
});



request.fail(function( jqXHR, textStatus ) {
		$("#day-calender").html('Без событий');
});


