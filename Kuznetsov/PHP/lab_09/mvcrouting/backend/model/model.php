<?php

class Model {
    //добавление страницы
    public function addPage($title, $text) {
        $lines = file('pages.txt');
        $arr = explode('~', end($lines));
        $i = $arr[0];
        $i = str_replace(array(chr(187),chr(191),chr(239)), '', $i);
        $i = +$i+1;
        $title = translit($title);
        $text = str_replace("\r\n", '<br>', $text);
        $str = "{$i}~{$title}~{$text}\r\n";
        file_put_contents('pages.txt', $str, FILE_APPEND);
    }
    //удаление страницы по id
    public function delPage($id) {
        $lines = file('pages.txt');
        $fop = fopen('pages.txt', 'w+b');
        foreach($lines as $key=>$value) {
            $arr = explode('~', $value);
            $i = $arr[0];
            //$i = str_replace(array(chr(187),chr(191),chr(239)), '', $i);
            if(+$i !== +$id) {
                fwrite($fop, $lines[$key]);
            }
        }
        fclose($fop);
    }
    //редактирование страницы
    public function editPage($id, $title, $text) {
        $text = str_replace("\r\n", '<br>', $text);
        $lines = file('pages.txt');
        $fop = fopen('pages.txt', 'w+b');
        $title = translit($title);
            foreach($lines as $key=>$value) {
                $arr = explode('~', $value);
            if(+$arr[0] === +$id) {
                $str = "{$id}~{$title}~{$text}\r\n";
                fwrite($fop, $str);
            } else {
                fwrite($fop, $lines[$key]);
            }
        }
        fclose($fop);
    }
    //получение страницы
    public function getPage($id) {
        $lines = file('pages.txt');
        foreach($lines as $key=>$value) {
            $str_arr = explode('~', $value);
            if(+$str_arr[0] === +$id) {
                $arr[] = [
                'id' => $str_arr[0],
                'title' => $str_arr[1],
                'text' => $str_arr[2]
                ];
            }
        }
        return $arr;
    }
    //получение всех страниц
    public function getAllPages() {
        $lines = file('pages.txt');
        foreach($lines as $key=>$value) {
            $str_arr = explode('~', $value);
            $arr[] = [
                'id' => $str_arr[0],
                'title' => $str_arr[1],
                'text' => $str_arr[2]
                ];
        }
        return ($arr)? array_reverse($arr) : null;
    }
}





