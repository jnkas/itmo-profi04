$.fn.ajaxPost = function() {
	var dt = $('#calinput').val();
	var request = $.ajax({
		url: "servicer.php",
		method: "POST",
		data: { date : dt },
		dataType: "json"
	});
	 
	request.done(function( obj ) {
		var today = obj[0].date.split('-');
		var todayStr = "" + today[2] + "." + today[1] + "." + today[0] + "г.";

		var content = "<h2>Мероприятия на " + todayStr + "</h2>";
		
		for (i = 0; i < obj.length; i++) {
			content += "<div class='media'>"
			content += "<img class='align-self-start mr-3' style='width:64px;' src='" + "img/" + obj[i].img + "' alt=" + obj[i].header + ">";
			content += "<div class='media-body'>";
			content += "<h5 class='mt-0 mb-1'>" + obj[i].header + "</h5><p>" + obj[i].description + "</p>";
			content += "</div>";
			content += "</div>";
		}
		
	  $("#events").html(content);
	});
	 
	request.fail(function( jqXHR, textStatus ) {
		$("#events").html('На данную дату нет мероприятий');
	});
};

$('#calinput').ajaxPost();

$('#calinput').change(function() {
	$(this).ajaxPost();
})