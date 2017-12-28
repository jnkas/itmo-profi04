var resBlock;
window.onload = function () {
    resBlock = document.getElementById('htmlExecute');
    promptFunctions.first();
};

var promptFunctions = {


    first: function () {
        var date = new Date();
        var hours = date.getHours(),
            minutes = date.getMinutes(),
            seconds = date.getSeconds();

        setInterval(function () {
            seconds++;
            if (seconds === 60) {
                minutes++;
                seconds = 0;
            }
            if (minutes === 60) {
                hours++;
                minutes = 0;
            }
            if (hours === 24) {
                hours = 0;
            }
            document.getElementById('seconds').innerText = seconds < 10 ? '0' + seconds : seconds;
            document.getElementById('minutes').innerText = minutes < 10 ? '0' + minutes : minutes;
            document.getElementById('hours').innerText = hours < 10 ? '0' + hours : hours;
            document.getElementById('clock').style.display = 'block';
        }, 1000);
    },

    second: function () {
        this.clearAndHideRes();
        var goods = {
            title: 'Witcher 3',
            photo_url: 'witcher-3.jpg',
            code_num: '2146516-f31xf',
            price: 99,
            description: 'The Witcher® 3: Wild Hunt is a story-driven, next-generation open world role-playing game, set in a visually stunning fantasy universe, full of meaningful choices and impactful consequences...',
            render: function (parentId) {
                var parent = document.getElementById(parentId),
                    div = document.createElement('div'),
                    title = document.createElement('p'),
                    desc = document.createElement('p'),
                    price = document.createElement('div'),
                    img = document.createElement('img');
                div.classList.add('one-goods');
                img.setAttribute('src', 'images/' + this.photo_url);
                img.classList.add('goods-image');


                desc.innerText = this.description;
                desc.classList.add('goods-desc');

                title.innerText = this.title;
                title.classList.add('goods-title');

                price.innerText = this.price + '$';
                price.classList.add('goods-price');

                div.appendChild(price);
                div.appendChild(title);
                div.appendChild(img);
                div.appendChild(desc);
                parent.appendChild(div);
            }
        };

        goods.render('htmlExecute');
        this.showRes();

    },

    third: function () {
        this.clearAndHideRes();
        var circles = ['top', 'center', 'bottom'],
            colors = ['green', 'orange', 'red'],
            outputBlock = 'htmlExecute',
            reverse = false,
            i = 0,
            rendered = false;

        var trafficLight = {

            render: function () {
                var parent = document.getElementById(outputBlock),
                    base = document.createElement('div'),
                    top = document.createElement('div'),
                    center = document.createElement('div'),
                    bottom = document.createElement('div');

                base.classList.add('traffic-light');

                top.classList.add('circle');
                top.setAttribute('id', 'top');

                center.classList.add('circle');
                center.setAttribute('id', 'center');

                bottom.classList.add('circle');
                bottom.setAttribute('id', 'bottom');

                base.appendChild(top);
                base.appendChild(center);
                base.appendChild(bottom);
                parent.appendChild(base);
                rendered = true;
            },
            switchColor: function () {
                if (!rendered) {
                    this.render();
                }
                for(var j =0; j<3; j++){
                    document.getElementById(circles[j]).style.backgroundColor = '#737373';
                }
                document.getElementById(circles[i]).style.backgroundColor = colors[i];
                i = reverse ? i-1 : i+1;
                if(i === 0){
                    reverse = false;
                }
                if(i === 2){
                    reverse = true;
                }
            }
        };
        trafficLight.switchColor();
        setInterval(function () {
            trafficLight.switchColor();
        }, 2000);
        this.showRes();
    },

    showRes: function () {
        resBlock.style.display = 'block';
    },

    clearAndHideRes: function () {
        resBlock.style.display = 'none';
        resBlock.innerHTML = '';
    }

};
