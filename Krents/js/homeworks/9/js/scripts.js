var resBlock;
var isCaps = false;
var isShift = false;
window.onload = function () {
    resBlock = document.getElementById('htmlExecute');
    document.getElementById('keyboard').addEventListener('click', clickHandler);
    document.getElementById('keyboard').addEventListener('mousedown', mouseDownHandler);
    document.getElementById('keyboard').addEventListener('mouseup', mouseUpHandler);

};

function clickHandler(e) {
    var button = e.target,
        textArea = document.getElementById('write');
    var letter = button.innerText;
    if (
        button.classList[0] === 'letter' ||
        button.classList[0] === 'symbol'

    ) {
        if (isCaps || isShift) {
            letter = letter.toUpperCase();
            if (isShift) {
                document.getElementsByClassName('shift')[0].classList.remove('clicked');
                document.getElementsByClassName('shift')[1].classList.remove('clicked');
                isShift = false;
            }
        }
        textArea.innerHTML += letter;
    }
    else if (button.classList[0] === 'tab') {
        textArea.innerHTML += '    ';
    }
    else if (button.classList[0] === 'delete') {
        textArea.innerHTML = textArea.innerHTML.substr(0, textArea.innerHTML.length - 1);
    }
    else if (button.classList[0] === 'space') {
        textArea.innerHTML += ' ';
    }
    else if (button.classList[0] === 'return') {
        textArea.innerHTML += '\n';
    }

}

function mouseDownHandler(e) {
    if (e.target.classList[0] === 'shift') {
        isShift = e.target.classList[1] !== 'clicked';
    }
    if (e.target.classList[0] === 'capslock') {
        isCaps = e.target.classList[1] !== 'clicked';
    }
    if (e.target.classList[1] === 'clicked') {
        e.target.classList.remove('clicked');
    }
    else {
        e.target.classList.add('clicked');
    }
}

function mouseUpHandler(e) {
    if (
        e.target.classList[0] === 'letter' ||
        e.target.classList[0] === 'tab' ||
        e.target.classList[0] === 'delete' ||
        e.target.classList[0] === 'return' ||
        e.target.classList[0] === 'space' ||
        e.target.classList[0] === 'symbol'
    ) {
        e.target.classList.remove('clicked');
    }
}

var promptFunctions = {
    first: function () {
        this.clearAndHideRes();

        function Div() {
            this.click = function (event) {
                event.target.style.backgroundColor = event.target.style.backgroundColor !== 'green' ? 'green' : '';

            };
            this.renderNew = function () {
                var div = document.createElement('div');
                div.classList.add('block');
                div.addEventListener('click', this.click);
                resBlock.appendChild(div);
            }
        }

        var firstDiv = new Div();
        firstDiv.renderNew();
        firstDiv.renderNew();
        firstDiv.renderNew();
        this.showRes();
        this.hideKeyBoard();


    },

    second: function () {
        var count = 0;
        this.clearAndHideRes();
        var button = document.createElement('button');
        button.classList.add('btn');
        button.classList.add('btn-default');
        button.style.width = '100px';
        button.addEventListener('click', increaseCounter);

        button.innerText = count;
        resBlock.appendChild(button);
        this.showRes();
        this.hideKeyBoard();

        function increaseCounter() {
            count++;
            button.innerText = count;
        }

    },

    third: function () {
        this.clearAndHideRes();

        this.showKeyBoard();
    },

    showRes: function () {
        resBlock.style.display = 'block';
    },

    showKeyBoard: function () {
        document.getElementById('container').style.display = 'block';
    },

    hideKeyBoard: function () {
        document.getElementById('container').style.display = 'none';
    },

    clearAndHideRes: function () {
        resBlock.style.display = 'none';
        resBlock.innerHTML = '';
    }

};
