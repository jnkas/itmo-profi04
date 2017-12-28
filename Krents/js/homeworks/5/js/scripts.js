var promptFunctions = {
    first: function () {

        var student = {
            name: 'George',
            last_name: 'Smith',
            age: 19,
            hobbies: [
                'Football',
                'Computer Gaming',
                'Bicycle'
            ]

        };
        this.printObjectContent(student)
    },

    second: function () {
        var A = [1, 2, 5, 7, 6],
            B = [2, 3, 4, 6, 8],
            C = [];
        for (var i = 0; i < A.length; i++) {
            if (C.indexOf(A[i]) === -1) {
                C.push(A[i])
            }
        }
        for (var j = 0; j < B.length; j++) {
            if (C.indexOf(B[j]) === -1) {
                C.push(B[j])
            }
        }
        console.log(C);

    },

    third: function () {
        var count = +prompt('Введите количество чисел в последовательности Фибоначчи:');
        if (isNaN(count)) {
            alert('Некорректное число');
            return;
        }
        if (count < 1) {
            alert('Введите целое число больше 0');
            return;
        }
        console.log(this.fibonacci(count));

    },
    fourth: function () {
        var dayNum = +prompt('Введите количество дней:');
        if (isNaN(dayNum)) {
            alert('Некорректное число');
            return;
        }
        console.log(this.getDayLocale(dayNum));

    },
    printObjectContent: function (obj) {
        for (var i in obj) {
            if (typeof obj[i] === 'object') {
                console.log('\t' + i + ':');
                this.printObjectContent(obj[i])
            }
            else {
                console.log(i + ': ' + obj[i]);
            }
        }
    },
    getDayLocale: function (dayNum) {
        var dayNumLastElement = +(dayNum + '').slice(-1);
        if (dayNum > 9 && dayNum < 20 || dayNum % 10 === 0 || dayNumLastElement > 4) {
            return dayNum + ' дней';
        }
        else if (dayNumLastElement === 1) {
            return dayNum + ' день';
        }
        return dayNum + ' дня';
    },
    fibonacci: function (count) {
        var res = [1, 1];
        if (count === 1) {
            res = [1];
        }
        if (count < 1) {
            res = [];
        }
        for (var i = 2; i < count; i++) {
            // console.log(res[i])
            res.push(res[i - 1] + res[i - 2]);
        }
        return res;
    }

};
