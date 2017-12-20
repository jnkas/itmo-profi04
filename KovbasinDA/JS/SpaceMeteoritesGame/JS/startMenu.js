; (function () {
    window.startMenu = {
        showMainMenu: function () {
            var menuField = document.getElementById("spaceField");
            var ctx = spaceField.getContext("2d");
            ctx.fillRect(0, 0, 800, 400);
            ctx.fillStyle = "#F00";
            ctx.font = 'oblique 800 80px Times New Roman';
            ctx.fillText("Meteoric field", 190, 150);
            ctx.font = 'normal 20px Times New Roman';
            ctx.fillText("PRESS ENTER TO START", 310, 200);

        }

    }
}());