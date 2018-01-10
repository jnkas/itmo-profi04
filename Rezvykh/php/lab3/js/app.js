$.fn.ajaxPost = function() {
	var dt = $('#calinput').val();
	document.cookie = "calDayFrom=" + dt;
	var dtt = $('#calinputTo').val();
	document.cookie = "calDayTo=" + dtt;
	var request = $.ajax({
		url: "servicer.php",
		method: "POST",
		data: { dateFrom : dt,  dateTo: dtt },
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

			var url = obj[i].img;
			var url = url.substr(0, url.length - 4)
			if (obj[i].description.length > 200) {

				obj[i].description = obj[i].description.substr(0, 200) + '...';

			}
			content += "<small class='text-muted'>" + obj[i].date + "</small>"
			content += "<h5 class='mt-0 mb-1'><a href='event.php?id=" + url + "'>" + obj[i].header + "</a></h5><p>" + obj[i].description + "</p>";
			content += "</div>";
			content += "</div>";
		}
		
	  $("#events").html(content);
	});
	 
	request.fail(function( jqXHR, textStatus) {
		$("#events").html('На данные даты нет мероприятий');
	});
};

$('#calinput').ajaxPost();

$('#calinput').change(function() {
	$(this).ajaxPost();
});
$('#calinputTo').change(function() {
	$(this).ajaxPost();
});

$('.calday').on('click', function(){
	document.cookie = "calDayFrom=" + $(this).attr('data-date');
	document.cookie = "calDayTo=";
	console.log($(this).attr('data-date'));
});