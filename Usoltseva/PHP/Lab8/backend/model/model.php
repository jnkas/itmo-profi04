<?php
define('FILENAME', 'asset/content.txt');
class Model {
    public function getPageById($pagesArray, $post) {
        $pageId = $post->readPost('id');
        foreach ($pagesArray as $value){
            if ($value['id'] == $pageId){
                $page = $value;
            }
        }
        return $page;
    }
    
    public function getAllPages(){
        $fileLines = file(FILENAME, FILE_IGNORE_NEW_LINES);
        $fileLines = str_replace("\xEF\xBB\xBF",'',$fileLines);
        $pagesArray = [];
        foreach ($fileLines as $value) {
            $tempArray = explode(';', $value);
            $singlePageArray = array_combine(['id','pageHeader','pageContent'],$tempArray);
            array_push($pagesArray, $singlePageArray);
            
        }
        return $pagesArray;
    }
    
    public function saveNewPage($pagesArray, $post, $server){
        //Ищем последний ID
        $id = 1;
        foreach ($pagesArray as $value){
            if ($value['id']>$id ){
                $id = $value['id'];
                $newid = $id + 1;
            }
        }
        //Записываем новую страницу в конец файла
        if (!empty($post->readPost('pageHeader')) && !empty($post->readPost('pagetext'))){
            $pageContent = "\r\n". $newid. ';'. $post->readPost('pageHeader'). ';'. $post->readPost('pagetext');
            file_put_contents(FILENAME,$pageContent,FILE_APPEND);
            header('Location:'.'http://' . $server->get('HTTP_HOST').'/index');
        }
        else {
            header('Location:'.'http://' . $server->get('HTTP_HOST').'/index');
        }
    }
    
    public function editPage($pagesArray, $post){
        $pageId = $post->readPost('id');
        foreach($pagesArray as $value) {
            if ($value['id'] == $pageId){
                $page = $value;
            }
        }
        return $page;
    }
    
    public function saveModifiedPage($pagesArray, $post, $server){
        $fileLines = '';
        $pageId = $post->readPost('id');
        foreach ($pagesArray as $value){
            if ($value['id'] == $pageId){
                $fileLines .= $post->readPost('id'). ';'. $post->readPost('pageHeader'). ';'. $post->readPost('pagetext'). "\r\n";
            }
            else {
                $fileLines .= $value['id']. ';'. $value['pageHeader']. ';'. $value['pageContent']. "\r\n";
            }
        }
        file_put_contents(FILENAME,rtrim($fileLines,"\r\n"));
        header('Location:'.'http://' . $server->get('HTTP_HOST').'/index');
    }
    
    public function deletePage($pagesArray, $post, $server){
        $pageId = $post->readPost('id');
        file_put_contents(FILENAME,"");
        $fileLines = '';
        foreach($pagesArray as $value) {
            if ($value['id'] !== $pageId){
                $fileLines .= $value['id']. ';'. $value['pageHeader']. ';'. $value['pageContent']. "\r\n";
            }
        } 
        file_put_contents(FILENAME,rtrim($fileLines,"\r\n"));
        header('Location:'.'http://' . $server->get('HTTP_HOST').'/index');
    }
}