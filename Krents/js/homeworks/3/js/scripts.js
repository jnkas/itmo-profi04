var promptFunctions = {
    first: function () {
        var number = prompt('Введите число строкой, для вычисления суммы цифр'),
            i = 0,
            sum = 0;
        while (number[i] !== undefined) {
            sum += +number[i];
            i++;
        }
        alert('Сумма равна: ' + sum);
    },

    second: function () {
        var string = prompt('Введите строку'),
            symbol = prompt('Символ, который хотите удвоить'),
            i = 0,
            resString = '';
        while (string[i] !== undefined) {
            resString += string[i] !== symbol ? string[i] : (string[i] + string[i]);
            i++;
        }
        alert('Результирующая строка: ' + resString);
    },

    third: function () {
        var pass = prompt('Введите пароль'),
            regOne = /.{9,}/g,
            regTwo = /[A-Z]+[a-z]+|[a-z]+[A-Z]+/g,
            regThree = /(.*\d){2,}/g,
            regFour = /[!$#%]/g;

        if (!regOne.test(pass)) {
            alert('Пароль должен содержать минимум 8 символов');
            return;
        }
        if (!regTwo.test(pass)) {
            alert('Пароль должен содержать английские буквы верхнего и нижнего регистра');
            return;
        }

        if (!regThree.test(pass)) {
            alert('Пароль должен содержать более двух цифр');
            return;
        }
        if (!regFour.test(pass)) {
            alert('Пароль должен содержать один из неалфавитных символов (например, !, $, #, %)');
            return;
        }

        alert('Отличный пароль!');

    }

};
