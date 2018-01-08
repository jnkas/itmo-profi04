function formatDate(date) {

  var dd = date.getDate();
  if (dd < 10) dd = '0' + dd;

  var mm = date.getMonth() + 1;
  if (mm < 10) mm = '0' + mm;

  var yyyy = date.getFullYear();

  return dd + '.' + mm + '.' + yyyy;
    
}

var date = new Date(); // 23 Дек 2017
var dt = formatDate(date); // '23.12.2017'
//var dt = "27.12.2017"; // '23.12.2017'


var request = $.ajax({
    url: "servicer.php",
    method: "POST",
    data: {id : dt},
    dataType: "json"
});

request.done(function( msg ){
    $( "#logDate" ).html( msg.date );
    $( "#logHeader" ).html( msg.header );
    $( "#logDesc" ).html( msg.desc );
    $( "#logImg" ).html( '<img src="img/' + msg.date + '.jpg" width=800 height=600>' );
});

request.fail(function( jqXHR, textStatus ){
    alert( "Request failed: " + textStatus );
});

console.log("script running");

