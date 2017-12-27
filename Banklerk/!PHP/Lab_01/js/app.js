var dt = '09.12.2017';
// var dt = '26.12.2017';

var request = $.ajax({
	method: "POST",
	url: "servicer.php",
	data: {
		id: dt
	},
	dataType: "json"
});
request.done(function (msg) {
	$('#day-calendar').html("<h1>" + msg[0] + "</h1>" + "<h2>" + msg[1] + "</h2>" + "<img src=" + msg[3] + ">" + "<p>" + msg[2] + "</p>");
});

request.fail(function (jqXHR, textStatus) {
	alert('Request failed: ' + textStatus);
});