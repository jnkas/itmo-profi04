(function () {
    window.arrayOperations = {
        getMin: function (array) {
            return Math.min(...array);
        },
        getMax: function (array) {
            return Math.max(...array);
        },
        getAverage: function (array) {
            let sum = 0;
            for (let i = 0; i < array.length; i++) {
                sum += array[i];
            }
            return sum / array.length;
        },
        getCopy: function (array) {
            return array.slice(0);
        }
    }
}());