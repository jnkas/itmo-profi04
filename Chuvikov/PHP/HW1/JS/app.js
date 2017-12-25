var dt = "22.12.2017";


var request = $.ajax({
    url:"servicer.php",
    method:"POST",
    data: {id: dt},
    dataType:"json",
    cache: false
});

request.done(function(obj){
    console.log(obj);
    $("#log").html(obj);
});

request.fail(function(obj){
    alert("Request failed: " + textStatus);
});

console.log("script running");

