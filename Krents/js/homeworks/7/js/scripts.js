let resBlock;
window.onload = function () {
    resBlock = document.getElementById('htmlExecute');
};

let promptFunctions = {
    first: function () {

        let student = {
            name: 'George',
            last_name: 'Smith',
            age: 19,
            education: 'ИТМО',
            hobbies: [
                'Football',
                'Computer Gaming',
                'Bicycle'
            ]

        };
        this.printStudentInfo(student)
    },

    second: function () {
        this.clearAndHideRes();

        function f(x) {
            if (x >= 1) {
                return 5 / x;
            }
            return x * x - 4 * x;
        }

        let plotLine = {
            x: [],
            y: [],
            type: 'scatter'
        };
        let x;
        for (let i = -500; i <= 500; i++) {
            x = i / 100;
            plotLine.x.push(x);
            plotLine.y.push(f(x));
        }
        let data = [plotLine];
        Plotly.newPlot('htmlExecute', data);
        this.showRes();
    },

    fourth: function () {
        let arrayOne = [12, 33, 113, 66, 54, 223];
        console.log(arrayOperations.getMin(arrayOne));
        console.log(arrayOperations.getMax(arrayOne));

        let arrayTwo = [1, 54, 12, 67, 31, 97];
        console.log(arrayOperations.getAverage(arrayOne));
        console.log(arrayOperations.getAverage(arrayTwo));

        let arrayThree = arrayOperations.getCopy(arrayOne);
        console.log(arrayThree);

    },
    fifth: function () {
        let alphabet = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'],
            string = prompt('Введите строку'),
            offset = +prompt('Введите число для сдвига'),
            newPos = 0,
            curPos = 0,
            newString = '';
        for (let i = 0; i < string.length; i++) {
            curPos = alphabet.indexOf(string[i].toLowerCase());
            newPos = curPos + offset;
            if (newPos > (alphabet.length)) {
                newPos = newPos % (alphabet.length);
            }
            newString += string[i].toLowerCase() === string[i] ? alphabet[newPos] : alphabet[newPos].toUpperCase();

        }
        console.log(newString);

    },
    printStudentInfo: function (student) {

        let hobbiesStr = '';
        for (let i in student.hobbies) {
            hobbiesStr += student.hobbies[i] + ', ';
        }
        let result = student.name + ' '
            + student.last_name + '. \n'
            + student.age + ' год. \nИнтересы: '
            + hobbiesStr.substr(0, hobbiesStr.length - 2) + '. \nУчится в '
            + student.education + '.';
        console.log(result);
    },

    showRes: function () {
        resBlock.style.display = 'block';
    },

    clearAndHideRes: function () {
        resBlock.style.display = 'none';
        resBlock.innerHTML = '';
    }


};
