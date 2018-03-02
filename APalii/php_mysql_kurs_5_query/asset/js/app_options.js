
$(function(){
	$("#3rd_selector").click(function() {
		console.log(this.id);
		var request = $.ajax({
		  url: "./index.php",
		  method: "POST",
		  data: { 'action' : ('getTable'+this.id) , 'tariff_id' : $('#tariff').val() }
		});


		request.done(function( obj ) {	
		  	console.log(obj);
		  	var table = JSON.parse(obj);
			drawGrid(table);
		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
});