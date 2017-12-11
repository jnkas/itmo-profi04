/*

 3 Подключить стороннюю библиотеку для юнит тестирования.
Написать несколько тестов для функции, рассчитывающей 
y = 1/x + sqrt(x).
 
 
*/

function calc_math(x){
    var y=0;
    y = 1/x + Math.sqrt(x);
    return y;  
}

describe("task_01 calc_math_numbers_from_string", function(){
 
	var input_x='4';
	var result = 2.25;
    var msg = "Вывести результат выполнения функции: " + input_x + " результат "+ result;
    it(msg, function(){
        var rez = calc_math(input_x);
        expect(rez).toBe(2.25);
    });
});
