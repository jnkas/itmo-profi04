/*
 Дана строка, изображающая целое число. Вывести сумму цифр этого числа. 
*/

function calc_y(x){
    var y;
    y = 1/x - Math.sqrt(x);
    return y;
}

describe("task_3 Test func(y=1/x+sqrt(x))", function(){
    var curr_x1 = 4;
	var msg1 = "Проверка функции со значением " + curr_x1 + " на равенство -1.75";
    it (msg1, function(){
        var y = calc_y(curr_x1);
        expect(y).toBe(-1.75);
    });

    var curr_x2 = -4;
    msg1 = "Проверка функции со значением " + curr_x2 + " на NaN";
    it (msg1, function(){
        var y = calc_y(curr_x2);
        expect(y).toBeNaN();
    });

    var curr_x3 = 1;
    msg1 = "Проверка функции со значением " + curr_x3 + " на === 0 true";
    it (msg1, function(){
        var y = calc_y(curr_x3);
        expect(y === 0).toBeTruthy();
    });


});