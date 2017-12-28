;window.onload = function () {
    var draw = false;
    var workField = document.getElementById('workField');
    workField.onmousemove = function (e) {
        if (draw) {
            var x = e.pageX - this.offsetLeft,
                y = e.pageY - this.offsetTop,
                context = this.getContext('2d');
            if (x < 300 && y < 300) {
                context.fillStyle = 'black';
                context.fillRect(x, y, 2, 2);

                context.fillStyle = 'yellow';
                context.fillRect(x + 300, y, 2, 2);

                context.fillStyle = 'red';
                context.fillRect(x, y + 300, 2, 2);

                context.fillStyle = 'blue';
                context.fillRect(x + 300, y + 300, 2, 2);

            }
        }

    };
    workField.onmousedown = function (e) {
        draw = true;
    };
    window.onmouseup = function (e) {
        draw = false;
    };


    var draw2 = false;
    var workField2 = document.getElementById('workField2');
    var context2 = workField2.getContext('2d');
    context2.fillStyle = 'black';
    context2.fillRect(0, 0, 600, 600);
    workField2.onmousemove = function (e) {
        if (draw2) {
            var x = e.pageX - this.offsetLeft,
                y = e.pageY - this.offsetTop;
            if (x < 300 && y < 300) {
                context2.fillStyle = 'white';
                context2.fillRect(x, y, 2, 2);

                context2.fillStyle = 'yellow';
                context2.fillRect(600 - x, y, 2, 2);

                context2.fillStyle = 'red';
                context2.fillRect(x, 600 - y, 2, 2);

                context2.fillStyle = 'blue';
                context2.fillRect(600 - x, 600 - y, 2, 2);

            }
        }

    };
    workField2.onmousedown = function (e) {
        draw2 = true;
    };
    window.onmouseup = function (e) {
        draw2 = false;
    };
};