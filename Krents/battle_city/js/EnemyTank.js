;window.EnemyTank = EnemyTank;

function EnemyTank() {
    BaseTank.call(this);
    this.directions = ['left', 'top', 'right', 'bottom',];
    this.baseTypes = {
        'fast': '<div class="element enemy-fast-tank-top-1"></div>'
    };
    this.maxMoveCount = 40;

    this.enemyInit = function (type) {
        this.type = 'enemy';
        let position = Math.floor(Math.random() * 3);
        this.baseInit('bottom', $(this.baseTypes[type]), {
            'margin-left': position * 240 + 'px',
            'margin-top': '0'
        });
        this.moveGenerator();
        this.fireGenerator();
    };

    this.moveGenerator = function () {

        let _this = this;
        this.currentDirection = this.directions[Math.floor(Math.random() * 4)];
        let movePixels = Math.floor(Math.random() * this.maxMoveCount);
        this.move('enemy-fast-tank-', 4);
        let interval = setInterval(function () {
            if (movePixels === 0) {
                clearInterval(interval);
                _this.stopMove();
                _this.moveGenerator();
                return false;
            }
            movePixels--;
        }, this.moveInterval);


    };

    this.fireGenerator = function () {
        let interval = null,
            _this = this;
        if (this.tank !== undefined) {
            interval = setInterval(function () {
                _this.fire();
            }, 10);
        }
        else {
            clearInterval(interval);
        }

    };

    this.keyUpHandler = function () {
        this.moveAudio.pause();
        clearInterval(this.interval);
        this.interval = null;
    }
}
