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
			dataType: "html"
		});

		request2.done(function( msg ){
			$( "#msgTimeline" ).html( msg);
		});

		request2.fail(function( jqXHR, textStatus ){
			alert( "Request failed: " + textStatus );
		});
		
	}
	
	element.onclick = eventLine;
	
	console.log("Ok");
}

click('runEventline');