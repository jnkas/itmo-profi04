var date = new Date();
var dt = date.getDate() + "." + (date.getMonth()+1) + "." + date.getFullYear();

var request = $.ajax({
    url: "serviser.php",
    method: "POST",
    data: {date : dt},
    dataType: "json"
});

request.done(function(msg){
    $("#calendar").html("<h1>" + msg[0] + "</h1>" + "<p><h3>" + msg[1] + "</h3>"+ "<h3>" + msg[2] + "</h3>" + "<img src=" + msg[3] + " align='left'></p>");
});
 request.fail(function(jqXHR, textStatus){
     alert("Request failed: " + textStatus);
 });