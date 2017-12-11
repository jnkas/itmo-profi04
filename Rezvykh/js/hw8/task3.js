;(function(){

window.svetofor = {
	run: function(domElement) {
		var mainElement = document.getElementById(domElement);
		var activeArr = document.getElementsByClassName("active");
		mainElement.innerHTML += "<div class='red'></div><div class='yellow'></div><div class='green'></div>";
		
		if (activeArr.length === 0) {
				mainElement.firstChild.classList.add("active");
		} 

		var a = true;
		function svetoMusic() {
			var red = document.getElementsByClassName("red")[0];
			var yellow = document.getElementsByClassName("yellow")[0];
			var green = document.getElementsByClassName("green")[0];
			var active = document.getElementsByClassName("active")[0];
			
			if (a === true) {
				if (active.classList.contains("red")) {
					red.classList.toggle("active");
					yellow.classList.toggle("active");
				} else if (active.classList.contains("yellow")) {
					yellow.classList.toggle("active");
					green.classList.toggle("active");
				} else if (active.classList.contains("green")) {
					green.classList.toggle("active");
					yellow.classList.toggle("active");
					a = false;
				}
			} else {
				yellow.classList.toggle("active");
				red.classList.toggle("active");
				a = true;
			}
		}

		var i = 0;
		var timer;

		setInterval(function(){
	      svetoMusic();
	    },2000);
	}
}
}());