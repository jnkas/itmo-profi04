var lastClickedNumber = 0;
var globalCount = 0;
var timer;
var time = 0;
window.onload = function () {
    gameLib.init();
};


var gameLib = {
    arr: [],

    clickedNumber: null,

    count: null,

    init: function () {
        this.count = prompt('Type size of game field');
        // this.count = 3;
        globalCount = this.count;
        this.clickedNumber = 0;
        var table = document.getElementsByTagName('table')[0];
        for (var i = 0; i < this.count; i++) {
            var tr = document.createElement('tr');
            for (var j = 0; j < this.count; j++) {
                var td = document.createElement('td');
                td.innerHTML = this.generateValue();
                td.style.backgroundColor = 'rgb(' + this.generateColor() + ',' + this.generateColor() + ',' + this.generateColor() + ')';
                td.style.fontSize = this.randomNumber(10, 20) + 'px';
                tr.appendChild(td);
            }
            table.appendChild(tr);
        }
        table.addEventListener('click', this.clickHandler, false);
    },

    clickHandler: function (event) {
        var target = event.target;
        var value = target.innerHTML;
        if (target.tagName === 'TD' && +value === (lastClickedNumber + 1)) {
            if (time === 0) {
                timer = setInterval(function () {
                    time++;
                    document.getElementById('timer').innerHTML = 'Time for that game - ' + time + ' secs.';
                    document.getElementById('timer').style.display = 'block';
                }, 1000);
            }
            lastClickedNumber++;
            target.style.visibility = 'hidden';
            document.getElementById('resultP').style.display = 'block';
            if ((globalCount * globalCount + 1) > lastClickedNumber + 1) {
                document.getElementById('resultNum').style.display = 'inline-block';
                document.getElementById('resultNum').innerText = '' + (lastClickedNumber + 1);
            }
            else {
                document.getElementById('resultP').style.display = 'none';
                document.getElementById('timer').innerHTML = 'GAME OVER <br> Your time is ' + time + ' sec.';
                clearInterval(timer);
            }

        }
    },

    generateColor: function () {
        return this.randomNumber(1, 255);
    },

    randomNumber: function (min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    },

    generateValue: function () {
        var number = this.randomNumber(1, this.count * this.count);
        if (this.arr.indexOf(number) === -1) {
            this.arr.push(number);
            return number;
        }
        return this.generateValue();
    }
};