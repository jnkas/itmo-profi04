;window.BaseTank = tank;
let enemyCount = 0,
    lifecount = 3,
    curEnemyCount = 3;

function tank() {
    this.moveInterval = 20;
    this.tank = null;
    this.bullet = null;
    this.coordinates = {};
    this.type = null;

    this.currentDirection = null;
    this.mainField = $('#field');
    this.interval = null;

    this.baseInit = function (side, tankElement, css) {
        this.currentDirection = side;
        this.bulletInterval = null;
        this.tank = tankElement;
        this.tank.css(css);
        this.mainField.append(this.tank);
        this.changePosition();
    };

    this.move = function (tankCLass, speed) {
        if (this.tank !== undefined) {
            let marginSide = 'margin-left',
                marginValue = speed === undefined ? 2 : speed;
            this.tank
                .removeAttr('classs')
                .attr('class', 'element')
                .addClass(tankCLass + this.currentDirection + '-1');
            if (this.currentDirection === 'left' || this.currentDirection === 'top') {
                marginValue = -1 * marginValue;
            }
            if (this.currentDirection === 'bottom' || this.currentDirection === 'top') {
                marginSide = 'margin-top';
            }
            if (this.interval === null) {
                let _this = this;
                this.interval = setInterval(function () {
                    _this.tank.toggleClass(tankCLass + _this.currentDirection + '-1 ' + tankCLass + _this.currentDirection + '-2');
                    if (_this.moveAudio !== undefined) {
                        _this.moveAudio.play();
                    }
                    let currentMargin = parseInt(_this.tank.css(marginSide)) + marginValue;
                    let haveBrick = _this.checkBrick(marginSide, marginValue);
                    _this.changePosition();
                    if (currentMargin > -1 && currentMargin < 481 && haveBrick) {
                        _this.tank.css(marginSide, currentMargin + 'px');
                    }
                }, this.moveInterval)
            }
        }
    };

    this.fire = function () {
        if (this.bulletInterval === null) {
            let valueLeft = 10,
                valueTop = 10,
                _this = this,
                valueSign = 1,
                marginSide = this.currentDirection === 'left' || this.currentDirection === 'right' ? 'left' : 'top';
            if (this.currentDirection === 'left') {
                valueLeft = -1 * valueLeft;
                valueSign = -1;
            }
            if (this.currentDirection === 'top') {
                valueTop = -1 * valueLeft;
                valueSign = -1;
            }
            if (this.currentDirection === 'bottom') {
                valueTop = 30;
            }
            if (this.currentDirection === 'right') {
                valueLeft = 30;
            }

            this.bullet = $('<div class="element bullet bullet-' + this.currentDirection + '"></div>');
            this.bullet.css({
                'margin-top': parseInt(this.tank.css('margin-top')) + valueTop + 'px',
                'margin-left': parseInt(this.tank.css('margin-left')) + valueLeft + 'px'
            });
            this.mainField.append(this.bullet);
            this.bulletInterval = setInterval(function () {
                    let key = 'margin-' + marginSide,
                        currentMargin = parseInt(_this.bullet.css(key)) + valueSign * 5,
                        css = {};
                    let haveBrick = _this.checkBlockage(key, valueSign * 5, _this.bullet);

                    if (currentMargin > -1 && currentMargin < 501 && haveBrick) {
                        css[key] = parseInt(_this.bullet.css(key)) + valueSign * 5 + 'px';
                        _this.bullet.css(css);
                    }
                    else {
                        clearInterval(_this.bulletInterval);
                        _this.bulletInterval = null;
                        _this.bullet.remove();
                    }
                }, 20
            );
        }
    };

    this.checkBlockage = function (side, value,) {
        let horizontalStart = parseInt(this.bullet.offset().left),
            verticalStart = parseInt(this.bullet.offset().top);
        if (side === 'margin-top') {
            verticalStart += value;
        }
        else {
            horizontalStart += value;
        }

        for (let i = horizontalStart; i < horizontalStart + 20; i++) {
            for (let j = verticalStart; j < verticalStart + 20; j++) {
                if (coordinates[i + '_' + j] !== undefined && this.coordinates[i + '_' + j] === undefined) {
                    let blockage = coordinates[i + '_' + j];
                    if ((blockage.type === 'enemy' || blockage.type === 'player') && blockage.type !== this.type) {
                        blockage.dead();
                    }

                    if (blockage instanceof $ && (blockage.hasClass('brick') || blockage.hasClass('brick-half-top') || blockage.hasClass('brick-half-left') )) {
                        for (let i = parseInt(blockage.offset().left); i < (parseInt(blockage.offset().left) + width['brick']); i += 2) {
                            for (let j = parseInt(blockage.offset().top); j < (parseInt(blockage.offset().top) + height['brick']); j += 2) {
                                if (coordinates[i + '_' + j] !== undefined) {
                                    delete(coordinates[i + '_' + j] );
                                }
                            }
                        }
                        blockage.remove();
                    }
                    if (blockage instanceof $ && (blockage.hasClass('base'))) {
                        blockage.removeClass('base').addClass('crush-2');
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    }

                    return false;
                }
            }
        }
        return true;

    };

    this.checkBrick = function (side, value) {
        let horizontalStart = parseInt(this.tank.offset().left),
            verticalStart = parseInt(this.tank.offset().top);
        if (side === 'margin-top') {
            verticalStart += value;
        }
        else {
            horizontalStart += value;
        }

        horizontalStart = horizontalStart - horizontalStart % 2;
        verticalStart = verticalStart - verticalStart % 2;

        for (let i = horizontalStart; i < horizontalStart + 40; i += 5) {
            for (let j = verticalStart; j < verticalStart + 40; j += 5) {
                if (coordinates[i + '_' + j] !== undefined && this.coordinates[i + '_' + j] === undefined)
                    return false;
            }
        }
        return true;

    };


    this.changePosition = function () {
        for (let key in this.coordinates) {
            delete(coordinates[key]);
            if (this.type === 'player') {
                delete(playerTankCoordinates[key]);
            } else {
                delete(enemyTankCoordinates[key]);
            }
        }
        this.coordinates = {};
        for (let i = parseInt(this.tank.offset().left); i < (parseInt(this.tank.offset().left) + 40); i += 2) {
            for (let j = parseInt(this.tank.offset().top); j < (parseInt(this.tank.offset().top) + 40); j += 2) {
                if (coordinates[i + '_' + j] === undefined) {
                    coordinates[i + '_' + j] = this;
                    this.coordinates[i + '_' + j] = 1;
                }
            }
        }
    };

    this.dead = function () {
        let _this = this;
        for (let key in this.coordinates) {
            delete(coordinates[key]);
            if (this.type === 'player') {
                delete(playerTankCoordinates[key]);
            } else {
                delete(enemyTankCoordinates[key]);
            }
        }
        this.stopMove();
        this.tank.remove();
        delete(this.tank);
        clearInterval(this.bulletInterval);
        this.bulletInterval = null;
        if (this.bullet !== null) {
            this.bullet.remove();
        }

        if (this.type === 'enemy' && enemyCount > 0 || this.type === 'player' && lifecount > 0) {
            this.init();
        }
        if (this.type === 'player') {
            lifecount--;
        }
        if (this.type === 'enemy') {
            enemyCount--;
        }
    };

    this.stopMove = function () {
        clearInterval(this.interval);
        this.interval = null;
    }


}
