;window.PlayerTank = PlayerTank;

function PlayerTank() {
    BaseTank.call(this);
    this.directions = {
        37: 'left',
        65: 'left',
        38: 'top',
        87: 'top',
        39: 'right',
        68: 'right',
        40: 'bottom',
        83: 'bottom'
    };

    this.moveAudio = new Audio('/battle_city/sounds/move.mp3');

    this.init = function () {
        this.type = 'player';
        this.baseInit('top', $('<div class="element player-tank-top-1"></div>'), {
            'margin-left': '180px',
            'margin-top': '480px'
        });
        $(document).keydown(this.keyDownHandler.bind(this));
        $(document).keyup(this.keyUpHandler.bind(this));
    };

    this.keyDownHandler = function (e) {
        let key = e.keyCode;
        if (this.directions[key] !== undefined) {
            this.currentDirection = this.directions[key];
            this.move('player-tank-', 3);
        }
        if (key === 32) {
            this.fire(key, this);
        }
    };

    this.keyUpHandler = function (e) {
        if (this.directions[e.keyCode] !== undefined) {
            this.moveAudio.pause();
            this.stopMove();
        }
    }
}
