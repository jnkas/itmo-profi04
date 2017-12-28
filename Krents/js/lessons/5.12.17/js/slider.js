;(function () {
    window.Slider = mySlider;

    function mySlider(element, settings) {
        this.slider = element;
        console.log(this.slider);
        this.slider.classList.add('container');
        var newDiv = document.createElement('div');
        newDiv.classList.add('image-slider-wrapper');
        var newUl = document.createElement('ul');
        newUl.classList.add('image_slider');
        var elLi;
        var img;

        for (var i in settings.arrImg) {
            img = document.createElement('img');
            img.src = settings.arrImg[i];
            elLi = document.createElement('li');
            elLi.appendChild(img);
            newUl.appendChild(elLi);
        }
        newDiv.appendChild(newUl);
        this.slider.appendChild(newDiv);
        setInterval(function () {
            var left = parseInt(newUl.style.left);
            left = isNaN(left) ? 0 : left;
            console.log(left);
            left = left - 1;
            newUl.style.left = left + 'px';
        }, 10);
    }
}());