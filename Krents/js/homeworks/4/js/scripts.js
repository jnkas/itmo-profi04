var promptFunctions = {
    first: function () {
        var A = [12, 4, 3, 10, 1, 20],
            B = [-3, -7, -100, -33];

        //в конец
        var C = A.concat(B);
        console.log(C);

        //в начало
        var _C = B.concat(A);
        console.log(_C);
    },

    second: function () {
        var area = [null, null, null, null, null, null, null, null, null],
            numbers = prompt('Введите последовательность 0 и 1(всего 8 штук) для наполнения поля'),
            table = '<table><tr>',
            reg = /[0-1]/g;
        if (!reg.test(numbers)) {
            alert('Последовательность должна содержать только 0 и 1');
            return;
        }
        if (numbers.length !== 9) {
            alert('Введите 8 символов');
            return;
        }
        for (var i = 0; i < 9; i++) {

            table += '<td>' + (numbers[i] === '0' ? 'o' : 'x') + '</td>';
            if ((i + 1) % 3 === 0 && i !== 8 && i !== 0) {
                table += '</tr><tr>'
            }
        }
        table += '</tr></table>';
        $('#htmlExecute').html(table).show();
    },

    third: function () {
        var arr = [12, 4, 3, 10, 1, 20],
            min = arr[0],
            max = 0;
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] < min) {
                min = arr[i];
            }
            if (arr[i] > max) {
                max = arr[i];
            }
        }
        delete arr[arr.indexOf(min)];
        delete arr[arr.indexOf(max)];
        arr = arr.filter(Boolean);
        console.log(arr);

    },
    fourth: function () {

        var arr = [12, 4, 3, 10, 1, 20],
            temp;
        //Bubble sort
        for (var i = 0; i < arr.length; i++) {
            for (var j = 0; j < (arr.length - 1 - i); j++) {
                if (arr[j + 1] < arr[j]) {
                    temp = arr[j + 1];
                    arr[j + 1] = arr[j];
                    arr[j] = temp;
                }
            }
        }
        i = j = null;
        console.log('Bubble: ');
        console.log(arr);

        //Shell sort
        var arrTwo = [12, 4, 3, 10, 1, 20, 7, 11, 23, 5];
        for (var k = Math.floor(arrTwo.length / 2); k > 0; k = Math.floor(k / 2)) {
            for (i = k; i < arrTwo.length; i++) {
                temp = arrTwo[i];
                for (j = i; j >= k; j -= k) {
                    if (temp < arrTwo[j - k]) {
                        arrTwo[j] = arrTwo[j - k];
                    }
                    else {
                        break;
                    }
                }
                arrTwo[j] = temp;
            }
        }

        console.log('Shell: ');
        console.log(arrTwo);
    }

};
