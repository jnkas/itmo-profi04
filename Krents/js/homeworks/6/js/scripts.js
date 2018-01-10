var promptFunctions = {
    array: [],
    first: function () {
        var n = +prompt('Введите число, факториал которого желаете посчитать:');
        console.log(this.factorial(n));
    },

    second: function () {
        console.log(this.generateArray());
        this.array = [];
    },


    factorial: function (n) {
        if (n > 1) {
            return n * this.factorial(n - 1);
        } else {
            return 1;
        }
    },
    generateOneNum: function () {
        return Math.floor(Math.random() * 100) + 1;
    },
    generateArray: function () {
        if (this.array.length === 100) {
            return this.array;
        }
        do {
            var num = this.generateOneNum();
            if (this.array.indexOf(num !== -1)) {
                this.array.push(num);
            }
        } while (this.array.length < 100);
        return this.array;
    }
};
