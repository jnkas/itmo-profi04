var canvasCurr = document.getElementById("canvasTicTac");
var canvasDraw = canvasCurr.getContext("2d");
var stateFigure;
stateFigure = 1;
var arrStates;
arrStates = [0,0,0,0,0,0,0,0,0];

canvasFieldTicTac(); //Выводим сетку игрового поля

/*Отслеживаем клик в области canvas*/
canvasCurr.onclick = function(event) {

    if (document.getElementById("modal").style.display !== "block") {   //Проверка вывода результата игры

        /*определяем область клика на канвасе и выполняем заполнение массива и ячейки игрового поля*/
        if ( event.pageX > 20 && event.pageX < 120 && event.pageY > 20 && event.pageY < 120) {
            stateFigure = checkedStatePositionDraw(50, 50, 0, stateFigure);
        }
        if ( event.pageX > 120 && event.pageX < 220 && event.pageY > 20 && event.pageY < 120) {
            stateFigure = checkedStatePositionDraw(150, 50, 1, stateFigure);
        }
        if ( event.pageX > 220 && event.pageX < 320 && event.pageY > 20 && event.pageY < 120) {
            stateFigure = checkedStatePositionDraw(250, 50, 2, stateFigure)
        }
        if ( event.pageX > 20 && event.pageX < 120 && event.pageY > 120 && event.pageY < 220) {
            stateFigure = checkedStatePositionDraw(50, 150, 3, stateFigure);
        }
        if ( event.pageX > 120 && event.pageX < 220 && event.pageY > 120 && event.pageY < 220) {
            stateFigure = checkedStatePositionDraw(150, 150, 4, stateFigure);
        }
        if ( event.pageX > 220 && event.pageX < 320 && event.pageY > 120 && event.pageY < 220) {
            stateFigure = checkedStatePositionDraw(250, 150, 5, stateFigure);
        }
        if ( event.pageX > 20 && event.pageX < 120 && event.pageY > 220 && event.pageY < 320) {
            stateFigure = checkedStatePositionDraw(50, 250, 6, stateFigure);
        }
        if ( event.pageX > 120 && event.pageX < 220 && event.pageY > 220 && event.pageY < 320) {
            stateFigure = checkedStatePositionDraw(150, 250, 7, stateFigure);
        }
        if ( event.pageX > 220 && event.pageX < 320 && event.pageY > 220 && event.pageY < 320) {
            stateFigure = checkedStatePositionDraw(250, 250, 8, stateFigure);
        }

        /*Выполняем проверку массива на соответствие условиям победы(есть 3 ячейки с одинаковыми значениями в ряд).*/
        checkWin(0,1,2);
        checkWin(3,4,5);
        checkWin(6,7,8);
        checkWin(0,3,6);
        checkWin(1,4,7);
        checkWin(2,5,8);
        checkWin(0,4,8);
        checkWin(6,4,2);
    }
};


/*Функция проверки на соответствие условиям победы и вывода сообщения об этом.*/
function checkWin(i1, i2, i3) {
    if (arrStates[i1] === arrStates[i2] && arrStates[i2] === arrStates[i3] && arrStates[i1] !== 0) {
        switch (arrStates[i1])
        {
            case 1:
                document.getElementById("modal").style.display = "block";
                document.getElementById("Text").innerHTML = "Победил крестик!";
                break;
            case 2:
                document.getElementById("modal").style.display = "block";
                document.getElementById("Text").innerHTML = "Победил нолик!";
                break;
            default:
                alert("Что то пошло не так!");
        }
    }
}

/*Функция смены очереди вывода символа, если 1 то крестик, если 2 то нолик*/
function checkCurrState(stateCase1) {
    switch (stateCase1) {
        case 1:
            stateCase1 = 2;
            return stateCase1;
        case 2:
            stateCase1 = 1;
            return stateCase1;
        default:
            stateCase1 = 1;
            return stateCase1;
    }
}

/*Функция проверки на заполненность поля и определения фигуры для отрисовки, а так же самой отрисовки*/
function checkedStatePositionDraw(xConvPos, yConvPos, posArr, stateCase2) {
    if (arrStates[posArr] === 0) {
        switch (stateCase2) {
            case 1:
                drawCross(xConvPos, yConvPos);              //рисуем крестик
                arrStates[posArr] = stateCase2;             //записываем соответствующе значение в ячейку массива
                stateCase2 = checkCurrState(stateCase2);    //меняем значение определяющее состояние фигруры
                return stateCase2;
            case 2:
                drawCircle(xConvPos, yConvPos);
                arrStates[posArr] = stateCase2;
                stateCase2 = checkCurrState(stateCase2);
                return stateCase2;
        }
    } else {
        return stateCase2;
    }
}

/*Функция отрисовки игрового поля*/
function canvasFieldTicTac() {
    canvasDraw.beginPath();
    canvasDraw.moveTo(100, 0);
    canvasDraw.lineTo(100, 300);
    canvasDraw.moveTo(200, 0);
    canvasDraw.lineTo(200, 300);
    canvasDraw.moveTo(0, 100);
    canvasDraw.lineTo(300, 100);
    canvasDraw.moveTo(0, 200);
    canvasDraw.lineTo(300, 200);
    canvasDraw.stroke();
    canvasDraw.closePath();
}

/*Функция отрисовки крестика*/
function drawCross(xCell, yCell) {
    canvasDraw.beginPath();
    canvasDraw.strokeStyle = "red";
    canvasDraw.moveTo(xCell - 35, yCell - 35);
    canvasDraw.lineTo(xCell + 35, yCell + 35);
    canvasDraw.moveTo(xCell + 35, yCell - 35);
    canvasDraw.lineTo(xCell - 35, yCell + 35);
    canvasDraw.lineWidth = 3;
    canvasDraw.stroke();
    canvasDraw.closePath();
}

/*Функция отрисовки нолика*/
function drawCircle(xCell, yCell) {
    canvasDraw.beginPath();
    canvasDraw.arc(xCell, yCell, 40, 0, Math.PI*2, false);
    canvasDraw.strokeStyle = "blue";
    canvasDraw.lineWidth = 3;
    canvasDraw.stroke();
    canvasDraw.closePath();
}



