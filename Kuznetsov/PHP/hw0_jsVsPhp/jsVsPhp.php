<?php

// комментарий
# комментарий
/* комментарий */

$a = 11;
$b = '2';
$c = "3";
$d = 'abc';
$e = "abc";
$f = 'xyz01';
$g = "zyx02";
$h = 4.5;
$i = '5.6';
$j = "6.7";
$k = array(1,2,3);
$l = [4,5,6];
$m = [7,8,[a=>1, "b"=>"2", 'c'=>'0']];
const N = 1010;

class Example {
    public $name = "Ser";
    public $age = 30;
}

$o = new Example;
$p = new Example();
$q = "абв";

function output() {
    echo "<br>";
}

var_dump($a);
output();
var_dump($b);
output();
var_dump($c);
output();
var_dump($d);
output();
var_dump($e);
output();
var_dump($f);
output();
var_dump($g);
output();
var_dump($h);
output();
var_dump($i);
output();
var_dump($j);
output();
var_dump($k);
output();
var_dump($l);
output();
var_dump($m);
output();
var_dump(N);
output();
var_dump($o);
output();
var_dump(function() {
    echo "hello";
});
output();
var_dump($p);
output();
var_dump($q);
output();
var_dump($a.$b.$c.$d.$e.$f.$g.$h.$i.$j.$k.$l.$m.N.$q);
output();


?>