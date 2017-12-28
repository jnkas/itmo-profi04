;window.EnemyTankFast = FastEnemy;

function FastEnemy() {
    EnemyTank.call(this);

    this.init = function () {
        this.enemyInit('fast');
    };
}
