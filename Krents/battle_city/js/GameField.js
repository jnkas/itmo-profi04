;window.GameField = GameField;
let enemyTankCoordinates = [],
    playerTankCoordinates = [],
    coordinates = {};
let width = {
    'brick': 40,
    'base': 40,
    'stone': 40,
    'brick-half-top': 40,
    'brick-half-left': 20,
    'stone-half-top': 40,
};
let height = {
    'brick': 40,
    'base': 40,
    'stone': 40,
    'brick-half-top': 20,
    'brick-half-left': 40,
    'stone-half-top': 20,
};

function GameField() {
    this.gameField = $('#field');
    this.init = function () {
        console.log(12321);
        enemyCount = 20;
        let levelData = [];
        console.log(12321);
        $.ajax({
            dataType: "json",
            url: 'levels/level_1.json',
            async: false,
            success: function (data) {
                levelData = data;
                console.log(levelData);
            },
            error: function (data) {
                console.log(data);
            }
        });
        console.log(levelData);
        for (let i in levelData) {
            let block = $('<div class="element ' + levelData[i].class + '"></div>');
            block.css({
                'left': levelData[i].left + 'px',
                'top': levelData[i].top + 'px'
            });
            this.gameField.append(block);
            this.addCoordinates(block, levelData[i].class);
            block = undefined;
        }
    };

    this.addCoordinates = function (brick, className) {
        for (let i = parseInt(brick.offset().left); i < (parseInt(brick.offset().left) + width[className]); i += 2) {
            for (let j = parseInt(brick.offset().top); j < (parseInt(brick.offset().top) + height[className]); j += 2) {
                if (coordinates[i + '_' + j] === undefined) {
                    coordinates[i + '_' + j] = brick;
                }
            }
        }
    };
}
