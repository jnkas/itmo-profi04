//var dt = "10.12.2017";
//var id = "date";
var get = getUrlVar();
console.log(get);
if (get !== false){
	var date = parseInt(get['dt']);
	var acctdate = new Date (date);		
}
else{
	var acctdate = new Date();
}
console.log(acctdate);
var day = (acctdate.getDate()<10 ? "" + 0 + acctdate.getDate(): acctdate.getDate());
var month = (acctdate.getMonth()+1<10 ? "" + 0 + (acctdate.getMonth()+1): (acctdate.getMonth()+1));
var dt = day +"."+ month +"."+ acctdate.getFullYear();	
//console.log(acctdate.getHours());
console.log(dt);
// var menuId = $( "ul.nav" ).first().attr( "id" );
var request = $.ajax({
  url: "serviser.php",
  method: "POST",
  data: { date : dt }
});
 
request.done(function( obj ) {	
//	console.log(obj);
	var text = JSON.parse(obj);

	$('#day').html(acctdate.toLocaleString("ru",{day:'numeric'}));
	$('#month').html(acctdate.toLocaleString("ru",{month:'long'}));
	$('#title').html(text.title);
	$('#img').html('<img src= "img/'+text.img +' ">');
	$('#descr').html(text.descr);	
});
 



request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
});


function getUrlVar(){
    var urlVar = window.location.search; // получаем параметры из урла
    var arrayVar = []; // массив для хранения переменных
    var valueAndKey = []; // массив для временного хранения значения и имени переменной
    var resultArray = []; // массив для хранения переменных
    arrayVar = (urlVar.substr(1)).split('&'); // разбираем урл на параметры
    if(arrayVar[0]=="") return false; // если нет переменных в урле
    for (i = 0; i < arrayVar.length; i ++) { // перебираем все переменные из урла
        valueAndKey = arrayVar[i].split('='); // пишем в массив имя переменной и ее значение
        resultArray[valueAndKey[0]] = valueAndKey[1]; // пишем в итоговый массив имя переменной и ее значение
    }
    return resultArray; // возвращаем результат
}