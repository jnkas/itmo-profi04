<?php


class Model {
    public function addPage($title, $text) {
        
        $lines = file('pages.txt');
        
        
        $arr = explode('~', end($lines)); 
        $fgh = $arr[0];
        $fgh = str_replace(chr(187), '', $fgh);
        $fgh = str_replace(chr(191), '', $fgh);
        $fgh = str_replace(chr(239), '', $fgh);
//        $fgh = $arr[0];
//        $fgh = trim($fgh, "191");
//        $fgh = trim($fgh, "187");
//        $fgh = trim($fgh, "239");
        
        //$i = (empty($arr[0]))? 1 : $arr[0]+1;
//        echo var_dump($lines[0]);
//        echo '<br>';
//        var_dump($arr[0]);
        //echo count_chars($arr[0], 3);
        //echo chr(187, 191, 239);
//        echo '<br>';
//        var_dump($fgh);
//        echo '<br>';
//        echo count_chars($fgh, 3);
//        echo '<br>';
//        echo '+arr='.+$arr[0];
//        echo '<br>';
        
        //print_r(count_chars($fgh, 1));
        
//        print_r($arr[0]);
//        echo '<br>';
//        echo var_export($arr[0]);
//        echo '<br>';
//        
//        if($arr[0]) {
//            $i = 1;
//            //echo '1';
//        } elseif(($arr[0] === 1) && (+$arr[0]+1)===1) {
//            $i = 2;
//            //echo '2';
//        } else {
//            
//            //echo '3';
//        }
        
//        $i = +$fgh+1;
//        echo '$i'.$i;
//        echo '<br>';
//        echo '$arr[0]=', $arr[0], '<br> ', gettype($arr[0]), '<br> ';
//        echo '+$arr[0]=', +$arr[0], '<br> ', gettype(+$arr[0]), '<br> ';
//        echo '$arr[0]+1=', $arr[0]+1, '<br> ', gettype($arr[0]+1), '<br> ';
//        echo '+$arr[0]+1=', +$arr[0]+1, '<br> ', gettype(+$arr[0]+1), '<br> ';
//        echo 'el', '<pre>';
//        print_r(end($lines));
//        echo '</pre>';

        //$i = (empty($arr[0]))? 1 : +($arr[0])+1;

//        $n = intval($arr[0]);
//        $i = ($n)?$n+1:1;
//        echo ($n)? 'true':'false';
//        echo '$n=', $n, '<br>', '$i=', $i, '<br>';
        //$title = translit($title);
//        $str = "{$i}~{$title}~{$text}\r\n";
//        file_put_contents('pages.txt', $str, FILE_APPEND);
        
    }
        
        
        
//        if(!empty($title) && !empty($text) && (substr_count($text, "\r\n"))===0) {
//            
//            $lines = file('pages.txt');
//            print_r($lines);
//            echo '<br>';
//            
//            $arrr = explode('~', end($lines)); //end($lines)
//            //$i = (empty($arr[0]))? 1 : +$arr[0]+1;
//            print_r($arrr);
//            echo '<br>';
//            echo $arrr[0];
//            echo '<br>';
//            $t = $arrr[0];
//            $i = $o + 1;
//            echo '$i=', $i, '<br>', '$t=', $t, '<br>';
//            
//            //$title = translit($title);
//            $str = "{$i}~{$title}~{$text}\r\n";
//            echo $str, '<br>';
//            file_put_contents('pages.txt', $str, FILE_APPEND);
//        }


    public function delPage($id) {
        $lines = file('pages.txt');
        $fop = fopen('pages.txt', 'w+b');
        foreach($lines as $key=>$value) {
            
            //echo $value, '<br>';
            //echo gettype($id), '<br>';
            
            $arr = explode('~', $value);
            $i = $arr[0];
            $i = str_replace(chr(187), '', $i);
            $i = str_replace(chr(191), '', $i);
            $i = str_replace(chr(239), '', $i);
            //echo $i, '<br>', gettype($i), '<br>';
            
            if(+$i !== $id) {
                fwrite($fop, $lines[$key]);
            }
        }
        fclose($fop);
    }
}


$model = new Model();







//$mdl = $model->delPage(1);
//$mdl = $model->addPage('222', '222');

//$a = ['1'];
//echo +$a[0];

//$lines = file('pages.txt');
//$arr = explode('~', end($lines));
//$i = (empty($arr[0]))? 1 : +$arr[0]+1;
//echo '<pre>';
//print_r($arr);
//echo '</pre>';
//echo '<br>', gettype($arr[0]);
//echo '<br>', gettype($i);
//
//
//$mdl = $model->addPage('222', '222');
//$lines = file('pages.txt');
/*echo '<pre>';
print_r($lines);
echo '</pre>';
echo '<br>';*/
//$arr = explode('~', end($lines));
//$i = (empty($arr[0]))? 1 : 'false'. +$arr[0]+1;
////$i = (empty($arr[0]))? 'true' : 'false';
////$i = $arr[0]+1;
//echo '<pre>';
//print_r($arr[0]);
//echo '</pre>';
//echo '<br>', gettype($arr[0]);
//echo '</pre>';
//
//$g = 1;
//echo '$g ',(empty($g))? 1 : $g+1;

//1~pervaya~первый текст
?>