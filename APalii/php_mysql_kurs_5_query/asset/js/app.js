
$(function(){
	$("#button li").click(function() {
		console.log(this.id);
		var request = $.ajax({
		  url: "./index.php",
		  method: "POST",
		  data: { 'action' : ('getTable'+this.id) }
		});


		request.done(function( obj ) {	
		  	console.log(obj);
		  	if (this.data == "action=getTableq3"){
		  		$("#options").html(obj);
		  		$("#jsGrid").html("");
		  	}
		  	else if (this.data == "action=getTableq5"){
		  		$("#options").html("");
		  		$("#jsGrid").html("");
		  		
		  		var data = JSON.parse(obj);
		  		$(".exp").html("");
		  		$(".exp").donutpie();
				$(".exp").donutpie('update', data);
				$(".exp").donutpie({
				  radius: 240,
				  tooltip : true,
				  tooltipClass : "donut-pie-tooltip-bubble"
				});
		  	}
		  	else{
		  		$("#options").html("");
				var table = JSON.parse(obj);
				drawGrid(table);
			}
		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	});
});



function drawGrid(table){
	//console.log(table); 
	$("#jsGrid").jsGrid({
	    width: "100%",
	    height: "400px",

	    inserting: false,
	    editing: false,
	    sorting: true,
	    paging: true,
	    reloadAfterSubmit:true,

	    data: table.data,

	    fields: table.header
	});
}