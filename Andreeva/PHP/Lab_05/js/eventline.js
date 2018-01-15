;
function click(idName) {

	var element = document.getElementById(idName);
	
	function eventLine() {
		
		var dateFrom = document.getElementById("dateFrom").value;
		var dateTo = document.getElementById("dateTo").value;
		console.log(dateFrom);  
		console.log(dateTo);
		
		var request2 = $.ajax({
			url: "eventline.php",
			method: "POST",
			data: {idFD : dateFrom, idLD : dateTo},
			dataType: "json"
		});

		request2.done(function( msg ){
            data = {"obj":msg};
            template = '{{#obj}}<div class="eventline"><div class="eventImg"><img src="img/{{date}}.jpg" class="img" width=300></div><div class="eventDesc"><p>{{date}}{{header}}</p><span>{{desc}}</span></div></div>{{/obj}}';
            result = Mustache.render(template, data);
			$( "#msgTimeline" ).html(result);
		});

		request2.fail(function( jqXHR, textStatus ){
			alert( "Request failed: " + textStatus );
		});
		
	}
	
	element.onclick = eventLine;
	
	console.log("Ok");
}

click('runEventline');

