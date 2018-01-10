var date = new Date();
var dt = formatDate(date);


function formatDate(date) {
    
    var dd = date.getDate();
    if (dd < 10) dd = '0' + dd;
    var mm = date.getMonth() + 1;
    if (mm < 10) mm = '0' + mm;
    var yyyy = date.getFullYear();

  return dd + '.' + mm + '.' + yyyy;
    
}

var request = $.ajax({
    url: "serviser.php",
    method: "POST",
    data: {id : dt},
    dataType: "json"
});

function dateConvert (){
    var dd = date.getDate();
    var mm = date.getMonth();
    function mmConvert () {
        if (mm === 00) {
            mm = 'Января';
        } else if (mm === 01){
            mm = 'Февраля';
        } else if (mm === 02){
            mm = 'Марта';
        } else if (mm === 03){
            mm = 'Апреля';
        } else if (mm === 04){
            mm = 'Мая';
        } else if (mm === 05){
            mm = 'Июня';
        } else if (mm === 06){
            mm = 'Июля';
        } else if (mm === 07){
            mm = 'Августа';
        } else if (mm === 08){
            mm = 'Сентября';
        } else if (mm === 09){
            mm = 'Октября';
        } else if (mm === 10){
            mm = 'Ноября';
        } else if (mm === 11){
            mm = 'Декабря';
        }
    return mm;
    }
    var yyyy = date.getFullYear();
    
  return dd + ' ' + mmConvert(mm);
}

request.done(function( msg ){
    $( "#dt" ).html( dateConvert(msg.date) );
    $( "#header" ).html( msg.desc );
    $( "#desc" ).html( msg.header );
    $( "#img" ).html( '<img src="img/' + msg.date + '.jpg" width=500 height=500>' );
});

request.fail(function( jqXHR, textStatus ){
    alert( "Request failed: " + textStatus );
});

console.log("script running");