var promptFunctions = {
    first: function () {
        var firstNum = prompt('Введите первое число: '),
            secondNum = prompt('Введите второе число: '),
            x,
            y;
        x = Math.min(firstNum, secondNum);
        y = Math.max(firstNum, secondNum);
        alert('Числа в порядке возрастания: \n x - ' + x + '\n y - ' + y);
    },

    second: function () {
        var pointA = {
            x: parseInt(prompt('Введите значение по оси x для точки A'), 10),
            y: parseInt(prompt('Введите значение по оси y для точки A'), 10),
            z: parseInt(prompt('Введите значение по оси z для точки A'), 10)
        };
        var pointB = {
            x: parseInt(prompt('Введите значение по оси x для точки B'), 10),
            y: parseInt(prompt('Введите значение по оси y для точки B'), 10),
            z: parseInt(prompt('Введите значение по оси z для точки B'), 10)
        };
        var pointC = {
            x: parseInt(prompt('Введите значение по оси x для точки C'), 10),
            y: parseInt(prompt('Введите значение по оси y для точки C'), 10),
            z: parseInt(prompt('Введите значение по оси z для точки C'), 10)
        };
        var rowAtoB = Math.sqrt(
            Math.pow((pointA.x - pointB.x), 2) +
            Math.pow((pointA.y - pointB.y), 2) +
            Math.pow((pointA.z - pointB.z), 2)
        );
        var rowBtoC = Math.sqrt(
            Math.pow((pointB.x - pointC.x), 2) +
            Math.pow((pointB.y - pointC.y), 2)
            + Math.pow((pointB.z - pointC.z), 2)
        );
        var rowAtoC = Math.sqrt(
            Math.pow((pointA.x - pointC.x), 2) +
            Math.pow((pointA.y - pointC.y), 2) +
            Math.pow((pointA.z - pointC.z), 2)
        );

        var A = +((Math.acos((Math.pow(rowAtoC, 2) - Math.pow(rowAtoB, 2) + Math.pow(rowBtoC, 2)) / (2 * rowAtoC * rowBtoC))) * 180 / Math.PI).toFixed(2);
        var B = +((Math.acos((Math.pow(rowAtoB, 2) - Math.pow(rowAtoC, 2) + Math.pow(rowBtoC, 2)) / (2 * rowAtoB * rowBtoC))) * 180 / Math.PI).toFixed(2);
        var C = +((Math.acos((Math.pow(rowAtoB, 2) - Math.pow(rowBtoC, 2) + Math.pow(rowAtoC, 2)) / (2 * rowAtoB * rowAtoC))) * 180 / Math.PI).toFixed(2);
        var res = '';
        if ((A === 90.00 || B === 90.00 || C === 90.00) && A + B + C === 180.00) {
            res = 'Треугольник прямоугольный. \n Углы: \n A = ' + A + '\n B = ' + B + '\n C = ' + C;
        } else {
            res = 'Треугольник не прямоугольный. \n Углы: \n A = ' + A + '\n B = ' + B + '\n C = ' + C;
        }
        alert(res);

    },

    third: function () {
        var number = +prompt('Введите номер месяца');
        if (number < 1 || number > 12) {
            alert('Странный номер месяца, попробуй еще раз');
            return;
        }
        var partOfYear = '';
        switch (number) {
            case 12:
            case 1:
            case 2:
                partOfYear = 'Зима';
                break;
            case 3:
            case 4:
            case 5:
                partOfYear = 'Весна';
                break;
            case 6:
            case 7:
            case 8:
                partOfYear = 'Лето';
                break;
            case 9:
            case 10:
            case 11:
                partOfYear = 'Осень';
                break;
        }
        alert(partOfYear);
    },

    fourth: function () {
        // 4. Единицы длины пронумерованы следующим образом:
        //     1 — дециметр, 2 — километр,
        //     3 — метр, 4 — миллиметр, 5 — сантиметр.
        //     Дан номер единицы длины и длина
        // отрезка L в этих единицах (вещественное число).
        // Вывести длину данного отрезка в метрах.
        var system = parseInt(prompt('Введите число, соответвующее еденице длины из списка ниже. \n' +
            '1 — дециметр\n' +
            '2 — километр\n' +
            '3 — метр\n' +
            '4 — миллиметр\n' +
            '5 — сантиметр'), 10);
        var number = parseInt(prompt('Введите длину отрезка'), 10);
        if (system < 1 || system > 5) {
            alert('Введенное число не соответсвует описанным условиям');
            return;
        }
        var multiplier;
        switch (system) {
            case 1:
                multiplier = 0.1;
                break;
            case 2:
                multiplier = 1000;
                break;
            case 3:
                multiplier = 1;
                break;
            case 4:
                multiplier = 0.001;
                break;
            case 5:
                multiplier = 0.01;
                break;
        }

        alert('Длина отрезка: ' + (+parseInt(number * multiplier).toFixed(2)) + 'm');
    },


    fifth: function () {
        var tableBody = '',
            table = '<table><thead><td></td>';
        for (var i = 1; i <= 10; i++) {
            table += '<td>' + i + '</td>';
            tableBody +='<tr><td>'+i + '</td>';
            for (var j = 1; j <= 10; j++) {
                tableBody += '<td>' + (i*j) + '</td>';
            }
            tableBody +='</tr>';
        }
        table += '</thead>';
        table += tableBody+'</table>';
        $('#htmlExecute').html(table).show();
    }
};
