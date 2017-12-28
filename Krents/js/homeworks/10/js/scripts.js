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

            this.addGoods = function (goods) {
                if (goods instanceof Goods) {
                    this.goodsList.push(goods);
                    this.goodsCount++;
                    this.totalPrice += goods.price;
                }
                else {
                    console.log('Error goods type.')
                }
                // return 'Имя: ' + this.name;
            };
            this.getTotalPrice = function () {
                return this.totalPrice;
            };
            this.getTotalCount = function () {
                return this.goodsCount;
            };
        }

        var goodsOne = new Goods('Witcher', 99);
        var goodsTwo = new Goods('Test product', 123);
        var goodsThree = new Goods('Fire stick', 2.5);
        var basket = new Basket();
        basket.addGoods(goodsOne);
        basket.addGoods(goodsTwo);
        basket.addGoods(goodsThree);
        basket.addGoods([1, 2]);
        console.log('Total price of all basket is ' + basket.getTotalPrice());
        console.log('Total goods count at basket is ' + basket.getTotalCount());

    },

    second: function () {
        this.clearAndHideRes();


        function Man(name, age, sex, hobbies) {
            this.hobbies = hobbies === undefined || !Array.isArray(hobbies) ? [] : hobbies;
            this.name = name === undefined ? 'Аноним' : name;
            this.age = age === undefined ? 0 : age;
            this.sex = sex === undefined ? 'Male' : sex;

            this.toString = function () {
                var hobbiesStr = '';
                for (var i in this.hobbies) {
                    hobbiesStr += this.hobbies[i] + ', ';
                }
                return 'Человек: ' + this.name + '\nВозраст:  '
                    + this.age + '\nПол: '
                    + this.sex + '\nИнтересы: '
                    + hobbiesStr.substr(0, hobbiesStr.length - 2) + '.';
            }
        }

        function Student(name, age, sex, hobbies, education) {
            Man.call(this, name, age, sex, hobbies);
            this.education = education === undefined ? 'Аноним' : education;
            this.toString = function () {
                var hobbiesStr = '';
                for (var i in this.hobbies) {
                    hobbiesStr += this.hobbies[i] + ', ';
                }
                return 'Студент: ' + this.name + '\nВозраст:  '
                    + this.age + '\nПол: '
                    + this.sex + '\nИнтересы: '
                    + hobbiesStr.substr(0, hobbiesStr.length - 2) + '. \nУчится в '
                    + this.education + '.';
            }
        }

        var hobbies = [
            'Football',
            'Computer Gaming',
            'Bicycle'
        ];
        var student = new Student(
            'Ivan',
            18,
            'Male',
            hobbies,
            'ИТМО'
        );


        alert(student);


    },

    clearAndHideRes: function () {
        resBlock.style.display = 'none';
        resBlock.innerHTML = '';
    }

};
