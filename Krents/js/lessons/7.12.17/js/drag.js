;window.onload = function () {
    var field = document.getElementById('field'),
        point = document.getElementById('point'),
        pointTwo = document.getElementById('point-two'),
        step = 10;
    var pointOnePos = point.getBoundingClientRect(),
        pointTwoPos = pointTwo.getBoundingClientRect(),
        maxLeft = field.offsetWidth - point.offsetWidth * 1.5,
        maxTop = field.offsetHeight - point.offsetHeight * 1.5;
    // pointTwo.style.top = Math.floor(Math.random()*380 + 1) + 'px';
    // pointTwo.style.left = Math.floor(Math.random()*380 + 1) + 'px';
    document.onkeydown = function (event) {
        if (event.keyCode === 39 && pointOnePos.left < maxLeft) {
            point.style.left = (pointOnePos.left - 1 + step) + 'px';
        }
        if (event.keyCode === 40 && pointOnePos.top < maxTop) {
            point.style.top = (pointOnePos.top - 1 + step) + 'px';
        }
        if (event.keyCode === 37 && pointOnePos.left > step) {
            point.style.left = (pointOnePos.left - 1 - step) + 'px';
        }
        if (event.keyCode === 38 && pointOnePos.top > step) {
            point.style.top = (pointOnePos.top - 1 - step) + 'px';
        }
        pointOnePos = point.getBoundingClientRect();
        pointTwoPos = pointTwo.getBoundingClientRect();
        changeColor();
    };

    function changeColor() {
        if (
            (pointOnePos.top >= (pointTwoPos.top - pointTwoPos.height) && pointOnePos.top <= (pointTwoPos.top + pointTwoPos.height)) &&
            pointOnePos.left >= (pointTwoPos.left - pointTwoPos.width) && pointOnePos.left <= (pointTwoPos.left + pointTwoPos.width)
        ) {
            point.classList.add('cross')
        }
        else {
            point.classList.remove('cross')
        }
    }
};