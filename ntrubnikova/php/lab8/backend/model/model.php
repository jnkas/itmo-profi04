<?php
define('FILENAME', 'asset/content.txt');
class Model {
    public function getPage() {
        return ['data' => 'Однажды в студеную зимнюю пору..'];
    }
    
    public function getAllPages(){
        $fileLines = file(FILENAME, FILE_IGNORE_NEW_LINES);
        $pagesArray = [];
        foreach ($fileLines as $value) {
            $tempArray = explode(';', $value);
            $singlePageArray = array_combine(['id','pageHeader','pageContent'],$tempArray);
            array_push($pagesArray, $singlePageArray);
            
        }
        return $pagesArray;
    }
    
    public function savePage($pagesArray, $post, $server){
        //Ищем последний ID
        $id = 1;
        foreach ($pagesArray as $value){
            if ($value['id']>$id ){
                $id = $value['id'];
                $newid = $id + 1;
            }
        }
        //Записываем данные
        if (!empty($post->readPost('pageHeader')) && !empty($post->readPost('pagetext'))){
            $pageContent = "\r\n". $newid. ';'. $post->readPost('pageHeader'). ';'. $post->readPost('pagetext');
            file_put_contents(FILENAME,$pageContent,FILE_APPEND);
            header('Location:'.'http://' . $server->get('HTTP_HOST').'/index');
        }
        else {
            header('Location:'.'http://' . $server->get('HTTP_HOST').'/index');
        }
    }
}