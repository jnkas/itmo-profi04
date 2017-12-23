var date = new Date();
var day = date.getDate();
var month = date.getMonth();
month = month + 1;
if ((String(day)).length == 1)
    {day = '0' + day;}
if ((String(month)).length == 1)
    {month = '0' + month;}


var myDate = day + '.' + month + '.' + date.getFullYear();

var request = $.ajax({
  method: "POST",
  url: "servicer.php",
  data: {date: myDate},
    dataType: "json"
})

request.done(function( obj ) {
    var date = obj.date;
    var title = obj.title;
    var description = obj.description;
    console.log(myDate, title, description);
    //Создать DIVы
    var divDate = "<div id=\"date\"></div>";
    var divTitle = "<div id=\"title\"></div>";
    var divText = "<div id=\"text\"></div>";
    var divImg = "<div><img src=\"img\\" + myDate + ".png\"></div>";
    $("#day-calender").append(divDate);
    $("#date").html(myDate);
    $("#day-calender").append(divTitle);
    $("#title").html(title);
    $("#day-calender").append(divText);
    $("#text").html(description);
    $("#day-calender").append(divImg);
    
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


