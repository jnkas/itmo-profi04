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
			dataType: "json"
		});

		request2.done(function( msg ){
			//$( "#msgTimeline" ).html( msg);
            data = {"obj" : msg};
            /*data = {
                "0": {
                    date:"25.12.2017",
                    header:"Test",
                    desc:"Opisanie"
                }
            };*/
            template = '{{#obj}}<div class="timeline"><img class="imgTML" src="img/{{date}}.jpg" width=140><h1> {{dateDDMM}} {{header}} </h1><p> {{desc}} </p></div>{{/obj}}';
            
            result = Mustache.render(template, data);
            $( "#msgTimeline" ).html( result );
            console.log(msg);
            console.log(data);
		});

		request2.fail(function( jqXHR, textStatus ){
			alert( "Request failed: " + textStatus );
		});
		
		
	}
	
	element.onclick = changeColor;
	
	console.log("Ok");
}

click('btn');
