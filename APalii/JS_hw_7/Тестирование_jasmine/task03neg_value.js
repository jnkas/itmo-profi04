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

describe("task_03 calc_math_numbers_from_string", function(){
 
	var input_x='-4';
	var result = NaN;
    var msg = "Вывести результат выполнения функции: " + input_x + " результат "+ result;
    it(msg, function(){
     
        
		var test = calc_math(input_x);
		console.log(test);
		if (isNaN(test)) {
			console.log(isNaN(test));
		}
		expect(isNaN(test)).toBe (true);
    });
});
