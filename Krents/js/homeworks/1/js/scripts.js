var digitToText = {
    0: 'ноль',
    1: 'один',
    2: 'два',
    3: 'три',
    4: 'четыре',
    5: 'пять',
    6: 'шесть',
    7: 'семь',
    8: 'восемь',
    9: 'девять'
};

var countDigits = {
    1: 'однозначное ',
    2: 'двузначное ',
    3: 'трехзначное '
};

var markToText = {
    1: 'плохо',
    2: 'неудовлетворительно',
    3: 'удовлетворительно',
    4: 'хорошо',
    5: 'отлично'
};

var promptFunctions = {
    minimal: function () {
        alert('Минимальное число:  ' +
            Math.min(
                prompt('Введите первое число: '),
                prompt('Введите второе число: '),
                prompt('Введите третье число: ')
            )
        );
    },

    numDescription: function () {
        var number = parseInt(prompt('Введите число в диапазоне от -999 до 999'), 10);
        if (number < -999 || number > 999) {
            alert('Введенное число не соответсвует описанным условиям');
            return;
        }
        var description = '';

        if (number === 0) {
            description = 'Нулевое ';
        }
        else {
            description = (number > 0 ? 'Положительное ' : 'Отрицательное ') + countDigits[number.toString().replace('-', '').length];
        }
        description += 'число';
        alert(description);
    },

    digitDescription: function () {
        var digit = parseInt(prompt('Введите целое число в диапазоне от 0 до 8'), 10);
        if (digit < 0 || digit > 9) {
            alert('Введенное число не соответсвует описанным условиям');
            return;
        }
        alert(digitToText[digit]);
    },

    markDescription: function () {
        var mark = parseInt(prompt('Введите целое число в диапазоне от 1 до 5'), 10);
        if (mark < 1 || mark > 5) {
            alert('Введенное число не соответсвует описанным условиям');
            return;
        }

        alert(markToText[mark]);
    },


    checkEqual: function () {
        var
            numberOne = parseInt(prompt('Введите первое число: '), 10),
            numberTwo = parseInt(prompt('Введите второе число: '), 10),
            numberThree = parseInt(prompt('Введите третье число: '), 10);

        alert(numberOne === numberTwo
            || numberOne === numberThree
            || numberTwo === numberThree
        );
    }
};


var atHtmlFunctions = {
    minimalShow: function () {
        this.showNumberList();
        this.setMethod('minimal')
    },

    numDescriptionShow: function () {
        this.showOneNumberField(-999, 999);
        this.setMethod('num_description');
    },

    digitDescriptionShow: function () {
        this.showOneNumberField(0, 9);
        this.setMethod('digit_description');
    },

    markDescriptionShow: function () {
        this.showOneNumberField(1, 5);
        this.setMethod('mark_description');
    },


    checkEqualShow: function () {
        this.showNumberList();
        this.setMethod('check_equal')
    },


    showNumberList: function () {
        this.changeTitle(true);
        this.showNHtmlViewBlock(180);
        $('.result-block').hide();
        $('.numbers-list').show();
        $('.one-number').hide();
    },

    showOneNumberField: function (min, max) {
        this.changeTitle();
        this.showNHtmlViewBlock(180);
        $('.result-block').hide();
        $('.numbers-list').hide();
        $('.one-number').show();
        $('.one-number input').attr('min', min).attr('max', max)
    },

    showNHtmlViewBlock: function (height) {
        $('#htmlExecute').css('height', height + 'px').show();
    },
    setMethod: function (method) {
        $('#method').val(method);
    },

    changeTitle: function (many) {
        $('form > h4').html('Введите ' + (many !== undefined ? 'числа' : 'число'));
    }
};

$(document).ready(function () {

    $('.close').on('click', function () {
        $('#htmlExecute').hide();
    });
    $('#form').on('submit', function (e) {
        e.preventDefault();
        var
            form = $('#form');
        var data = objectifyForm(form.serializeArray());
        if (data.method === 'minimal') {
            setResult('Минимальное число: ' + Math.min(
                data.number_one,
                data.number_two,
                data.number_three
            ), 280);
        } else if (data.method === 'num_description') {
            var description = '';
            if (data.number === '0') {
                description = 'Нулевое ';
            }
            else {
                description = (data.number > 0 ? 'Положительное ' : 'Отрицательное ') + countDigits[data.number.toString().replace('-', '').length];
            }
            description += 'число';
            setResult(description, 280);
        } else if (data.method === 'digit_description') {
            setResult(digitToText[data.number], 280);
        } else if (data.method === 'mark_description') {
            setResult(markToText[data.number], 280);
        } else if (data.method === 'check_equal') {
            setResult((data.number_one === data.number_two
                || data.number_one === data.number_three
                || data.number_two === data.number_three).toString()
                , 280);
        }

    });


    function setResult(text, height) {
        var resultBlock = $('.result-block'),
            result = $('#result');
        result.html(text);
        atHtmlFunctions.showNHtmlViewBlock(height);
        resultBlock.show();
    }


    // Thanks to https://stackoverflow.com/questions/1184624/convert-form-data-to-javascript-object-with-jquery
    function objectifyForm(formArray) {//serialize data function

        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }
});