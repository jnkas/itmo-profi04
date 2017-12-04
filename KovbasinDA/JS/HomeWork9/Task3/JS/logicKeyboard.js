document.onkeydown = function (e) {
    document.getElementById("b" + e.keyCode.toString()).style.backgroundColor = "red";
    document.getElementById("b" + e.keyCode.toString()).style.transition = "300ms";
    document.getElementById("textResult").focus();
};

document.onkeyup = function (e) {
    document.getElementById("b" + e.keyCode.toString()).style.backgroundColor = "";
    document.getElementById("b" + e.keyCode.toString()).style.transition = "300ms";
};

