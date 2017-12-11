function CurrProduct(name, price) {
    this.name = name;   //должна быть строка
    this.price = price; //должно быть число
}

function BasketOfGoods() {
    var arrayProducts = [];
    var summProducts = 0;

    this.addProduct = function (product) {
        arrayProducts[arrayProducts.length] = product;
    };

    this.returnSummProd = function () {
        return summProducts = arrayProducts.reduce(function (sum, current) {
            return sum + current.price;
        }, 0);
    };

    this.returnAmountProd = function () {
        return arrayProducts.length;
    };
}