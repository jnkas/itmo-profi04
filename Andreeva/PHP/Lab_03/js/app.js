function formatDate(date) {
    
  var dd = date.getDate();
  if (dd < 10) dd = '0' + dd;

  var mm = date.getMonth() + 1;
  if (mm < 10) mm = '0' + mm;

  var yyyy = date.getFullYear();

  return dd + '.' + mm + '.' + yyyy; 
}

var date = new Date();

var dt = formatDate(date);

$(function(){
    var request = $.ajax({
        url: "servicer.php",
        method: "POST",
        data: {id : dt},
        dataType: "json"
    });

    request.done(function( msg ){
        $( "#eventDate" ).html( msg.date );
        $( "#eventName" ).html( msg.header );
        $( "#eventDesc" ).html( msg.desc );
        $( "#eventImg" ).html( '<img src="img/' + msg.date + '.jpg">' );
    });

    request.fail(function( jqXHR, textStatus ){
        alert( "Request failed: " + textStatus );
    });

    console.log("script running");
});