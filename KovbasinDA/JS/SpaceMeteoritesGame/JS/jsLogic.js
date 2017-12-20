; (function () {
    window.startGame = {
        showGame: function () {

/*Задаем основные переменные игры*/
var spaceField = document.getElementById("spaceField");
var ctx = spaceField.getContext("2d");
var arrMeteorites = []; //массив для метеоритов
var arrMeteorites2 = []; //массив для метеоритов
var arrShots = [];      //массив для выстрелов
var gameState = "";     //переменная для отслеживания игрового состояния "GameOver", "win", ""
var scoreValue = 0;     //переменная для подсчета очков
let planetCoordX = 450; //значение координаты Х для планеты на заднем фоне
ctx.fillStyle = "black";

/*задаем стиль вывода шрифта score в нижнем левом углу*/
ctx.strokeStyle = "#F00";
ctx.font = 'normal 30px arial';

/*Подгружаем картинку планеты*/
planetImg = new Image();
planetImg.src = "images/Mars_Planet.png";

/*Подгружаем картинку корабля и выстрела*/
spaceShipImg = new Image();
spaceShipImg.src = "images/myShip3.png";
beamShotImg = new Image();
beamShotImg.src = "images/beamShot.png";

/*Подгружаем картинку метеоритов*/
meteorite1Img = new Image();
meteorite2Img = new Image();
meteorite1Img.src = "images/Meteorites/Meteorite2.png";
meteorite2Img.src = "images/Meteorites/Meteorite3.png";

/*Подгружаем картинку вывода надписи победы и проигрыша*/
youWinImg = new Image();
gameOverImg = new Image();
youWinImg.src = "images/you-win2.png";
gameOverImg.src = "images/GameOver.png";

/*Объект отслеживания нажатий кнопок клавиатуры*/
var inputState = {
    goTop: false,
    goBottom: false,
    goLeft: false,
    goRight: false,
    shot: false
};

var mySpaceship = new SpaceShip(0, 150, 50, 50, spaceShipImg);
mySpaceship.activ = true;

/*Заполняем массив метеоритов*/
for (var i = 0; i < 5; i++) {
    arrMeteorites[i] = new Meteorite(810, randomCoordY(), 50, 50, meteorite2Img);
}

for (var l = 0; l < 3; l++) {
    arrMeteorites2[l] = new Meteorite(810, randomCoordY(), 50, 50, meteorite1Img);
}

/*Заполняем массив выстрелов*/
for (var j = 0; j < 5; j++) {
    arrShots[j] = new Shot(0, -100, 30, 10, beamShotImg);
}

/*получаем время начала игры*/
var timeStartGame = new Date().getTime();

/*Меняем свойства объекта inputState в зависимости от нажатия клавиш*/
document.onkeydown = function (e) {
    if (e.keyCode === 39) inputState.goRight = true;
    if (e.keyCode === 37) inputState.goLeft = true;
    if (e.keyCode === 38) inputState.goTop = true;
    if (e.keyCode === 40) inputState.goBottom = true;
    if (e.keyCode === 32) inputState.shot = true;
};

document.onkeyup = function (e) {
    if (e.keyCode === 39) inputState.goRight = false;
    if (e.keyCode === 37) inputState.goLeft = false;
    if (e.keyCode === 38) inputState.goTop = false;
    if (e.keyCode === 40) inputState.goBottom = false;
    if (e.keyCode === 32) inputState.shot = false;
};

/*Запускаем игровой цикл*/
var gameCycle = setInterval(gamePass, 1000 / 60);


/*Создание объектов SpaceObject*/
function SpaceObject(positionX1, positionY1, sizeX, sizeY, image) {
    this.positionX1 = positionX1;
    this.positionY1 = positionY1;
    this.sizeX = sizeX;
    this.sizeY = sizeY;
    this.image = image;
    this.activ = false;

    /*Методы получения вторых координат, для определения размеров объекта*/
    this.positionX2 = function () {
        return this.positionX1 + this.sizeX;
    };

    this.positionY2 = function () {
        return this.positionY1 + this.sizeY;
    };
}

/*Создание объектов SpaceShip */
function SpaceShip(positionX1, positionY1, sizeX, sizeY,  image) {
    SpaceObject.call(this, positionX1, positionY1, sizeX, sizeY,  image);

    /*метод выстрела*/
    this.shot = function () {
        for (var i = 0; i < 5; i++) {
            if (arrShots[i].activ === false) {
                arrShots[i].activ = true;
                arrShots[i].positionX1 = this.positionX1 + 50;
                arrShots[i].positionY1 = this.positionY1 + 23;
                break;
            }
        }
    }

}

/*Создаем объекты Meteorite*/
function Meteorite(positionX1, positionY1, sizeX, sizeY,  image) {
    SpaceObject.call(this, positionX1, positionY1, sizeX, sizeY,  image);

    /*Метод движения метеорита*/
    this.meteoriteMove = function () {
        this.positionX1 -= 10;
        if (this.positionX1 < -60) {
            this.positionX1 = 810;
            this.positionY1 = randomCoordY();
        }
    };

    this.meteoriteMove2 = function () {


        function goNow(curY) {
            let tempFunc = moveTopY;

            function checkFunk() {
                if (curY <= 10) {
                    tempFunc = moveBotY;
                } else if (curY >= 320) {
                    tempFunc = moveTopY;
                }
            }
            checkFunk();
            return tempFunc(curY);
        }

        //goNow(this.positionY1);
        this.positionX1 -= 7;
        this.positionY1 = goNow(this.positionY1);
        if (this.positionX1 < -60) {
            this.positionX1 = 810;
            this.positionY1 = randomCoordY();
        }
    }
}

/*создание объектов Shot*/
function Shot(positionX1, positionY1, sizeX, sizeY,  image) {
    SpaceObject.call(this, positionX1, positionY1, sizeX, sizeY,  image);

    /*Метод движения выстрела*/
    this.shotMove = function () {
        this.positionX1 += 15;
        if (this.positionX1 > 810) {
            this.activ = false;
        }
    }
}


/*Определяем что происходит за одну итерацию игрового цикла*/
function gamePass() {
    gameUpdate();
    gameRender();
}

/*Обновляем логику игры и координаты игровых объектов*/
function gameUpdate() {
    movementSpaceship();
    checkingBorder();
    movementMeteorites();
    checkedSpaceToCollapse();
}

/*Функция движения и стрельбы нашего корабля*/
function movementSpaceship() {
    if (inputState.goRight) mySpaceship.positionX1 += 5;
    if (inputState.goLeft) mySpaceship.positionX1 -= 5;
    if (inputState.goTop) mySpaceship.positionY1 -= 5;
    if (inputState.goBottom) mySpaceship.positionY1 += 5;


    arrShots.forEach(function (elem) {
        if (elem.activ) elem.shotMove();
    });

    /*Проверяем на нажатие клавиши, еслинажата, делаем объект Shot активным*/
    if (inputState.shot) mySpaceship.shot();
}

/*Проверка границ канваса, что бы корабль не вылетал за пределы видимого поля*/
function checkingBorder() {
    if (mySpaceship.positionX1 < 0) mySpaceship.positionX1 = 0;
    if (mySpaceship.positionX1 > 750) mySpaceship.positionX1 = 750;
    if (mySpaceship.positionY1 < 0) mySpaceship.positionY1 = 0;
    if (mySpaceship.positionY1 > 350) mySpaceship.positionY1 = 350;
}

/*функция ввода в игру метеоритов и их движение*/
function movementMeteorites() {
    /*Определяем когда добавлять очередной метеорит на экран*/
    var currTime = new Date().getTime();
    if ((currTime - timeStartGame) > 2000) {
        arrMeteorites[0].activ = true;
        /*arrMeteorites2[0].activ = true;*/
    }

    if ((currTime - timeStartGame) > 5000) {
        arrMeteorites[1].activ = true;
    }

    if ((currTime - timeStartGame) > 15000) {
        arrMeteorites[2].activ = true;
    }

    if ((currTime - timeStartGame) > 20000) {
        arrMeteorites[3].activ = true;
    }

    if ((currTime - timeStartGame) > 25000) {
        arrMeteorites[4].activ = true;
    }

    /*Если прошло 30с меняем состояние игры на Win и прерываем игровой цикл*/
    if ((currTime - timeStartGame) > 30000) {
        gameState = "Win";
        clearInterval(gameCycle);
    }

    /*двигаем все активные метеориты на экране*/
    arrMeteorites.forEach(function (elem) {
        if (elem.activ) elem.meteoriteMove();
    });

    arrMeteorites2.forEach(function (elem) {
        if (elem.activ) elem.meteoriteMove2();
    })
}

/*функция проверки двух активных объектов на collapse*/
function checkedCollapse(objCompare1, objCompare2) {
    return ((((objCompare1.positionX1 >= objCompare2.positionX1 && objCompare1.positionX1 <= objCompare2.positionX2()) ||
        (objCompare1.positionX2() >= objCompare2.positionX1 && objCompare1.positionX2() <= objCompare2.positionX2())) &&
        ((objCompare1.positionY1 >= objCompare2.positionY1 && objCompare1.positionY1 <= objCompare2.positionY2()) ||
            (objCompare1.positionY2() >= objCompare2.positionY1 && objCompare1.positionY2() <= objCompare2.positionY2())))
        && ((objCompare1.activ === true) && (objCompare2.activ === true)));
}

/*Проверяем все наши объекты на collapse*/
function checkedSpaceToCollapse() {

    /*Проверка collapse метеоритов и корабля*/
    arrMeteorites.forEach(function (elem) {
        if (checkedCollapse(mySpaceship, elem)) {
            gameState = "GameOver";
            clearInterval(gameCycle);
        }
    });

    /*Проверка collapse выстрелов и метеоритов*/
    arrShots.forEach(function (elemShot) {
        arrMeteorites.forEach(function (elemMeteor) {
            if (checkedCollapse(elemShot, elemMeteor)) {
                elemShot.activ = false;
                elemMeteor.positionX1 = 810;
                elemMeteor.positionY1 = randomCoordY();
                scoreValue += 100;
            }
        })
    })
}

/*Генерация случайных чисел для координаты Y (Используем для рандомного появления метеоритов)*/
function randomCoordY() {
    return Math.floor(Math.random() * (350 - 1 + 1)) + 1;
}

function moveBotY(currY) {
    return ++currY;
}

function moveTopY(currY) {
    return --currY;
}

/*Функция отрисовки игровых объектов в одном кадре*/
function gameRender() {
    ctx.fillRect(0, 0, 800, 400);
    ctx.drawImage(planetImg, planetCoordX -= 0.1, 100, 600, 600);
    ctx.drawImage(mySpaceship.image, mySpaceship.positionX1, mySpaceship.positionY1, mySpaceship.sizeX, mySpaceship.sizeY);

    /*для каждого активного элемента выполняем отрисовку*/
    arrMeteorites.forEach(function (elem) {
        if (elem.activ) ctx.drawImage(elem.image, elem.positionX1, elem.positionY1, elem.sizeX, elem.sizeY);
    });
    arrMeteorites2.forEach(function (elem) {
        if (elem.activ) ctx.drawImage(elem.image, elem.positionX1, elem.positionY1, elem.sizeX, elem.sizeY);
    });
    arrShots.forEach(function (elem) {
        if (elem.activ) ctx.drawImage(elem.image, elem.positionX1, elem.positionY1, elem.sizeX, elem.sizeY);
    });

    ctx.strokeText("SCORE: " + scoreValue, 20, 380);    //отрисовка очков

    if (gameState === "GameOver") {
        ctx.drawImage(gameOverImg, 0, 0, 800, 400);
    }
    if (gameState === "Win") {
        ctx.drawImage(youWinImg, 0, 0, 800, 350);
    }
}



        }

    }
}());