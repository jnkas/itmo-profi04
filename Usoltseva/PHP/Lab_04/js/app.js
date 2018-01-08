var date = new Date();
var dt = date.getDate() + "." + (date.getMonth()+1) + "." + date.getFullYear();

var request = $.ajax({
    url: "serviser.php",
    method: "POST",
    data: {date : dt},
    dataType: "json"
});

request.done(function(msg){
    $("#event").html("<div id='eventDate'><h1>" + msg[0] + "</h1></div>" + "<div id='content'><h2>" + msg[1] + "</h2><p>" + msg[2] + "</p>" + "<img src=" + msg[3] + "></div>");
});
 request.fail(function(jqXHR, textStatus){
     alert("Request failed: " + textStatus);
 });