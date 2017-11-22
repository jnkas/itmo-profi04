//№1 Задача первая
/*
var alpha = [ 12, 4, 3, 10, 1, 20 ];
var beta = [-3, -7, -100, -33];
//в конец
/* 
var alphabet=alpha.concat(beta);
alert(alphabet);*/
//в начало
/*
var alphabet=beta.concat(alpha);
alert(alphabet);
*/

//№2 Задача вторая
var arr=[12,4,3,10,1,20];
/*var max = Math.max.apply(null, arr);
var min = Math.min.apply(null, arr);
arr.splice(max);
arr.splice(min);*/
delete Math.max.apply(null, arr);
delete Math.min.apply(null, arr);
alert(arr);

//почему то не работают оба варианта второй задачи надо еще почитать потом доделаю
