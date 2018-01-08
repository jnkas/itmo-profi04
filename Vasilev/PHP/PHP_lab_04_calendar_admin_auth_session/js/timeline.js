/*

$('#btn').click(function(){
     var firstDate = document.getElementById("firstDate").value;
     var lastDate = document.getElementById("lastDate").value;
         console.log("firstDate");         
    
    var request2 = $.ajax({
        url: "timeline.php",
        method: "POST",
        data: {idFD : firstDate, idLD : lastDate},
        dataType: "html"
    });

    request2.done(function( msg ){
        $( "#msgTimeline" ).html( msg);
    });

    request2.fail(function( jqXHR, textStatus ){
        alert( "Request failed: " + textStatus );
    });

});
console.log("script running");

*/
;
function click(idName) {

	var element = document.getElementById(idName);
	
	function changeColor() {
		
		if(element.style.backgroundColor === 'green'){ //сначала задаем условие для green, иначе цвет поменяется на зеленый только со второго щелчка
			element.style.backgroundColor = 'orange';
		} else {
			element.style.backgroundColor = 'green';
		}

		
		var firstDate = document.getElementById("firstDate").value;
		var lastDate = document.getElementById("lastDate").value;
		console.log(firstDate);  
		console.log(lastDate);
		
		var request2 = $.ajax({
			url: "timeline.php",
			method: "POST",
			data: {idFD : firstDate, idLD : lastDate},
			dataType: "html"
		});

		request2.done(function( msg ){
			$( "#msgTimeline" ).html( msg);
		});

		request2.fail(function( jqXHR, textStatus ){
			alert( "Request failed: " + textStatus );
		});
		
		
	}
	
	element.onclick = changeColor;
	
	console.log("Ok");
}

click('btn');
