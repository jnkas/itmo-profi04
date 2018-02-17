
var request = $.ajax({
  url: "./index.php",
  method: "POST",
  data: { 'action' : 'getClients' }
});

request.done(function( obj ) {	
  	//console.log(obj);
	var clients = JSON.parse(obj);
	drawGrid(clients);
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


function drawGrid(clients){
	$("#jsGrid").jsGrid({
	    width: "100%",
	    height: "400px",

	    inserting: true,
	    editing: true,
	    sorting: true,
	    paging: true,
	    reloadAfterSubmit:true,

	    data: clients,
		controller:{
			
			insertItem: function(item) {
				item["action"] = "insertItem";
				var req = $.ajax({
					type: "POST",
					url: "./index.php",
					data: item
				});
				
				req.done(function( obj ) {
					console.log(obj);	
				  	item["auth_id"] = obj;
				});
				return "";
			},
			
			updateItem: function(item) {
				item["action"] = "updateItem";
				console.log(item);
				return $.ajax({
					type: "POST",
					url: "./index.php",
					data: item
				});
			},
			
			deleteItem: function(item) {
				item["action"] = "deleteItem";
				return $.ajax({
					type: "POST",
					url: "./index.php",
					data: item
				});
			},
		},

	    fields: [
	        { name: "login", type: "text", width: 150, validate: "required" },
	        { name: "pass", type: "text", width: 150, validate: "required" },
	        { type: "control" }
	    ]
	});
}