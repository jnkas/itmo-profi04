//№1
//сложение цифр вводимого числа
/*var str= prompt("Введите любое количество цифр: ");
if (str==0) alert ("Сумма чисел равна нулю.");
var len=str.length;
len=+(len);
var i;
var sum=0;
for (i=0;i<=len;i++) {
    sum+=+str.charAt(i);
}
alert ("Сумма - "+sum);
*/
//честно скажу - чуть не поседел, пока доделал - как делать понятно было, но реализация как всегда не на высоте была//

//№2
//замена всех c на двойную c
/*
var s = "crocodile";
var x = /c/g;
var res = s.replace(x,"cc");
document.write(res);
*/

//№3
//проверка пароля на соответствие требованиям
var pas = prompt("Please enter your password: ")
if (pas.length<9){
    alert("Password very short");
}
else if()
    //№3 пришлю позже как сделать уже знаю просто поздно