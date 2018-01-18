

$(function() {
    $('#btn1').click(function() {
 
		//console.log($('#date').val());
		var dt = new Date(Date.parse($('#date').val()));
		console.log($('#date').val());
		console.log(Date.parse($('#date').val()));
		console.log(Date(Date.parse($('#date').val())));


		var daysInMonth  = new Date(dt.getFullYear(), dt.getMonth()+1, 0).getDate();
		console.log(daysInMonth);
		var content = "";
		var monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
		for(var i=1; i <= daysInMonth; i++){
			var istr = (i<10 ? "" + 0 + i: i);
			var curdate = istr + "." + (dt.getMonth()+1) + "." + dt.getFullYear();
			var curdateJS = Date.parse(istr + " " + monthNames[dt.getMonth()] + " " + dt.getFullYear());
			//console.log(curdate);
			content+="<a href='http://localhost/PHP/index.html?dt="+curdateJS+"'> "+curdate;
			content+="<img  width = '100px' src= 'img/"+curdate+".jpg '></a><br>";
				
		}
		$('#log').html(content);
    });
});

