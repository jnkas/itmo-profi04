var resBlock;
window.onload = function () {
    resBlock = document.getElementById('htmlExecute');
};

var promptFunctions = {

    first: function () {
        this.clearAndHideRes();

        function Goods(name, price) {
            this.name = name === undefined ? 'Пустое наименование' : name;
            this.price = price === undefined ? 0 : price;
        }

        function Basket() {
            this.goodsList = [];
            this.goodsCount = 0;
            this.totalPrice = 0;
        }

        Basket.prototype.addGoods = function (goods) {
            if (goods instanceof Goods) {
                this.goodsList.push(goods);
                this.goodsCount++;
                this.totalPrice += goods.price;
            }
            else {
                console.log('Error goods type.')
            }
        };
        Basket.prototype.getTotalPrice = function () {
            return this.totalPrice;
        };
        Basket.prototype.getTotalCount = function () {
            return this.goodsCount;
        };

        var goodsOne = new Goods('Witcher', 99);
        var goodsTwo = new Goods('Test product', 123);
        var goodsThree = new Goods('Fire stick', 2.5);
        var basket = new Basket();
        var basketTwo = new Basket();
        basket.addGoods(goodsOne);
        basketTwo.addGoods(goodsOne);
        basket.addGoods(goodsTwo);
        basket.addGoods(goodsThree);
        basketTwo.addGoods(goodsThree);
        basket.addGoods([1, 2]);
        console.log('Total price of all basket one is ' + basket.getTotalPrice());
        console.log('Total goods count at basket one is ' + basket.getTotalCount());
        console.log('Total price of all basket two is ' + basketTwo.getTotalPrice());
        console.log('Total goods count at basket two is ' + basketTwo.getTotalCount());

    },

    second: function () {
        this.clearAndHideRes();
        var hobbies = [
            'Football',
            'Computer Gaming',
            'Bicycle'
        ];

        function Human(name, age, sex, hobbies) {
            this.hobbies = hobbies === undefined || !Array.isArray(hobbies) ? [] : hobbies;
            this.name = name === undefined ? 'Аноним' : name;
            this.age = age === undefined ? 0 : age;
            this.sex = sex === undefined ? 'Male' : sex;
        }

        Human.prototype.toString = function () {
            var hobbiesStr = '';
            for (var i in this.hobbies) {
                hobbiesStr += this.hobbies[i] + ', ';
            }
            return 'Человек: ' + this.name + '\nВозраст:  '
                + this.age + '\nПол: '
                + this.sex + '\nИнтересы: '
                + hobbiesStr.substr(0, hobbiesStr.length - 2) + '.';
        };
        var human = new Human(
            'Anna',
            23,
            'Female',
            hobbies
        );
        alert(human);

        function Student(name, age, sex, hobbies, education) {
            Human.call(this, name, age, sex, hobbies);
            this.education = education === undefined ? 'Аноним' : education;

        }

        Student.prototype.toString = function () {
            var hobbiesStr = '';
            for (var i in this.hobbies) {
                hobbiesStr += this.hobbies[i] + ', ';
            }
            return 'Студент: ' + this.name + '\nВозраст:  '
                + this.age + '\nПол: '
                + this.sex + '\nИнтересы: '
                + hobbiesStr.substr(0, hobbiesStr.length - 2) + '. \nУчится в '
                + this.education + '.';
        };

        function StudentTwo(human, education) {
            Human.call(this, human.name, human.age, human.sex, human.hobbies);
            this.education = education === undefined ? '' : education;
        }

        StudentTwo.prototype.__proto__ = Student.prototype;
        var student = new Student(
            'Ivan',
            18,
            'Male',
            hobbies,
            'ИТМО'
        );
        var studentTwo = new StudentTwo(
            human,
            'СПЬГУ'
        );
        alert(student);
        alert(studentTwo);
    },

    third: function () {
        this.showRes();
        var className;
        var reverse = false;
        var table = {
            clickHandler: function (e) {
                reverse = className === e.target.getAttribute('id') && !reverse;
                className = e.target.getAttribute('id');
                console.log(reverse);
                var values = [];
                var data = document.getElementsByClassName(className);
                for (var i = 0, l = data.length; i < l; i++) {
                    values.push(data[i].innerHTML);
                }
                if (className === 'number') {
                    values.sort(table.compareNumbers);
                }
                else {
                    values.sort();
                }
                if (reverse) {
                    values.reverse();
                }
                table.renderTable(values, className, data);
            },

            compareNumbers: function (a, b) {
                return a - b;
            },

            renderTable: function (values, className, data) {
                var tbody = document.getElementsByTagName('tbody')[0];
                var res = [];
                for (var i = 0; i < data.length; i++) {
                    res[values.indexOf(data[i].innerText)] = data[i];
                    delete values[values.indexOf(data[i].innerText)];
                }
                tbody.innerHTML = '';
                for (var j = 0; j < res.length; j++) {
                    tbody.appendChild(res[j].parentNode);
                }
            }
        };
        document.getElementsByTagName('thead')[0].addEventListener('click', table.clickHandler);


    },
    showRes: function () {
        resBlock.style.display = 'block';
    },
    clearAndHideRes: function () {
        resBlock.style.display = 'none';
        resBlock.innerHTML = '';
    }

};
