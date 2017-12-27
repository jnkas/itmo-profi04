var dt = "12.02.2017";

var currDate = new Date();
var formatDate = currDate.format("dd.mm.yyyy");

var request = $.ajax({
    cache: false,
    url: "servicer.php",
    method: "POST",
    data: {id : formatDate},
    dataType: "json"
});

request.done(function (obj) {
    console.log("done" + obj);
    $("#day-calender").html(obj);   
});

request.fail(function (obj) {
    console.log("fail");
    console.log(obj);
    $("#day-calender").html(obj);
});