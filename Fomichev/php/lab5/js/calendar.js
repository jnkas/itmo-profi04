window.onload = function () {
    var D1 = new Date(),
        D1last = new Date(D1.getFullYear(),D1.getMonth()+1,0).getDate(), // последний день месяца
        D1Nlast = new Date(D1.getFullYear(),D1.getMonth(),D1last).getDay(), // день недели последнего дня месяца
        D1Nfirst = new Date(D1.getFullYear(),D1.getMonth(),1).getDay(), // день недели первого дня месяца
        calendar1 = '<tr>',
        month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"]; // название месяца, вместо цифр 0-11

// пустые клетки до первого дня текущего месяца
    if (D1Nfirst != 0) {
        for(var  i = 1; i < D1Nfirst; i++) calendar1 += '<td>';
    }else{ // если первый день месяца выпадает на воскресенье, то требуется 7 пустых клеток
        for(var  i = 0; i < 6; i++) calendar1 += '<td>';
    }

// дни месяца
    for(var  i = 1; i <= D1last; i++) {
        calendar1 += '<td><a href="page.php?selectedDate=' + i + '.' + (D1.getMonth()+1) + '.' + D1.getFullYear() + '">' + i + '</a>';
        if (new Date(D1.getFullYear(),D1.getMonth(),i).getDay() == 0) {  // если день выпадает на воскресенье, то перевод строки
            calendar1 += '<tr>';
        }
    }

// пустые клетки после последнего дня месяца
    if (D1Nlast != 0) {
        for(var  i = D1Nlast; i < 7; i++) calendar1 += '<td>';
    }

    document.querySelector('#calendar1 tbody').innerHTML = calendar1;
    document.querySelector('#calendar1 thead td:last-child').innerHTML = D1.getFullYear();
    document.querySelector('#calendar1 thead td:first-child').innerHTML = month[D1.getMonth()];
};
