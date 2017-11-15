//numeroUno
/*
var x = prompt ("Please enter X:");
var y = prompt ("Please enter Y:");
var z = prompt ("Please enter Z:");
if (x<y && x<z) 
    alert(x+" is minimum");
else if (y<x && y<z)
    alert (y+" is minimum");
else if (z<x && z<y)
    alert (z+" is minimum");
else if (x==y && y==z)
    alert("Kommunizm");
else
    alert("Mistake detected!")
    */

//numeroDuo
/*
var x = prompt ("Please enter X (between at -999 to 999):");
if (x==0) 
    alert("This null");
else if (x>0 && x<10)
    alert ("Положительное однозначное число");
else if (x>=10 && x<100)
    alert ("Положительное двузначное число");
else if (x>=100 && x<1000)
    alert ("Положительное трехзначное число");
else if (x<0 && x>-10)
    alert ("Отрицательное однозначное число");
else if (x<=-10 && x>-100)
    alert ("Отрицательное двузначное число");
else if (x<=-100 && x>-1000)
    alert ("Отрицательное трехзначное число");
else alert ("Mistake");
*/

//numeroTres

/*
var x = prompt("Please enter number (0-9):");
switch(x){
        case '0':
            alert('This number is ноль');
            break;
        case '1':
            alert('This number is один');
            break;
       case '2':
            alert('This number is два');
            break;
        case '3':
            alert('This number is три');
            break;
        case '4':
            alert('This number is четыре');
            break;
        case '5':
            alert('This number is пять');
            break;
        case '6':
            alert('This number is шесть');
            break;
        case '7':
            alert('This number is семь');
            break;
        case '8':
            alert('This number is восемь');
            break;
        case '9':
            alert('This number is девять');
            break;
        default:
            alert('You wrong understand your mission...');
}
*/

//numeroQuatro

/*
var x = prompt("Ваша оценка(1-5):");
switch(x){
        case '1':
            alert('Кол');
            break;
        case '2':
            alert('Пара');
            break;
       case '3':
            alert('Тройбан');
            break;
        case '4':
            alert('Хорошо');
            break;
        case '5':
            alert('Отлично');
            break;
        case '6':
            alert('Зачет за четверть!');
            break;
         default:
            alert('Вряд ли можно было неправильно понять условия этого задания, но Вы справились с этим!! Успехи очевидны! Коллеги, давайте все вместе поздравим это выдающееся молодое дарование!');
}
*/

//numeroLast

var x=6;
var y=97;
var z=6;
if (x==y || x==z || y==z) 
    document.write(true);
else
    document.write(false); 

//честно говоря последнее задание не очень хорошо понял, это может быть причиной неверного его решения 