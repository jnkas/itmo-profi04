;(function () {
    window.myLibForArr = {
        minValue: function (arrTemp) {
            return Math.min.apply(null, arrTemp);
        },
        maxValue: function (arrTemp) {
            return Math.max.apply(null, arrTemp);
        },
        averageValue: function (arrTemp) {
            var summ = arrTemp.reduce(function (sum, currVal) {
                return sum + currVal;
            });

            return summ/arrTemp.length;
        },
        cloneArr: function (arrTemp, minI, maxI) {
            return arrTemp.slice(minI,maxI);
        }
    }
}());